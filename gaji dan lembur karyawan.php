<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tugas 5 - Menghitung Gaji dan Lembur Karyawan</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }
    table {
      border-collapse: collapse;
      width: 80%;
      margin: 30px auto;
    }
    th, td {
      border: 1px solid #333;
      padding: 8px;
    }
    th {
      background-color: #007BFF;
      color: white;
    }
    select, button {
      padding: 5px 8px;
      font-size: 14px;
    }
  </style>
</head>
<body>

<h2>Tugas 5 - Menghitung Gaji dan Lembur Karyawan</h2>

<form method="post" action="">
  <table style="width:60%; margin:auto; text-align:center;">
    <tr>
      <th>No</th>
      <th>Nama Karyawan</th>
      <th>Pilih Jam Kerja</th>
    </tr>
    <?php
    // Buat 4 karyawan
    for ($i = 1; $i <= 4; $i++) {
      echo "<tr>
              <td>$i</td>
              <td>Karyawan $i</td>
              <td>
                <select name='jam_kerja[]' required>
                  <option value='' disabled selected>-- Pilih Jam --</option>
                  <option value='35'>35 jam</option>
                  <option value='40'>40 jam</option>
                  <option value='45'>45 jam</option>
                  <option value='50'>50 jam</option>
                </select>
              </td>
            </tr>";
    }
    ?>
  </table>
  <br>
  <button type="submit" name="hitung">Hitung Gaji</button>
</form>

<?php
if (isset($_POST['hitung'])) {
    $jam_kerja = $_POST['jam_kerja'];
    $tarif_normal = 20000;
    $tarif_lembur = 25000;

    echo "<h3>Hasil Perhitungan Gaji Karyawan</h3>";
    echo "<table>
            <tr>
              <th>No</th>
              <th>Jam Kerja</th>
              <th>Jam Normal</th>
              <th>Jam Lembur</th>
              <th>Gaji Normal (Rp)</th>
              <th>Gaji Lembur (Rp)</th>
              <th>Total Gaji (Rp)</th>
            </tr>";

    $no = 1;
    foreach ($jam_kerja as $jam) {
        if ($jam > 40) {
            $jam_normal = 40;
            $jam_lembur = $jam - 40;
        } else {
            $jam_normal = $jam;
            $jam_lembur = 0;
        }

        $gaji_normal = $jam_normal * $tarif_normal;
        $gaji_lembur = $jam_lembur * $tarif_lembur;
        $total_gaji = $gaji_normal + $gaji_lembur;

        echo "<tr>
                <td>$no</td>
                <td>$jam</td>
                <td>$jam_normal</td>
                <td>$jam_lembur</td>
                <td>" . number_format($gaji_normal, 0, ',', '.') . "</td>
                <td>" . number_format($gaji_lembur, 0, ',', '.') . "</td>
                <td><b>" . number_format($total_gaji, 0, ',', '.') . "</b></td>
              </tr>";

        $no++;
    }

    echo "</table>";
}
?>

</body>
</html>
