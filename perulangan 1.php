<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pengumpulan Nilai Siswa</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #eef3f7;
      text-align: center;
      margin-top: 50px;
    }
    table {
      margin: 0 auto;
      border-collapse: collapse;
      width: 60%;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: center;
    }
    th {
      background-color: #1e90ff;
      color: white;
    }
    input[type="number"] {
      width: 80px;
      text-align: center;
    }
    input[type="submit"] {
      background-color: #1e90ff;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 15px;
    }
    input[type="submit"]:hover {
      background-color: #0066cc;
    }
  </style>
</head>
<body>
  <h2>Form Pengumpulan Nilai Siswa</h2>

  <form method="post" action="">
    <table>
      <tr>
        <th>Nama Siswa</th>
        <th>Nilai</th>
      </tr>
      <?php
      // Membuat 5 baris input
      for ($i = 1; $i <= 5; $i++) {
          echo "<tr>
                  <td>Siswa $i</td>
                  <td><input type='number' name='nilai[]' min='0' max='100' required></td>
                </tr>";
      }
      ?>
    </table>
    <input type="submit" name="hitung" value="Hitung Rata-Rata">
  </form>

  <?php
  if (isset($_POST['hitung'])) {
      $nilai = $_POST['nilai'];
      $total = 0;

      // Menghitung total nilai
      for ($i = 0; $i < count($nilai); $i++) {
          $total += $nilai[$i];
      }

      // Rata-rata
      $rata = $total / count($nilai);

      // Menentukan keterangan
      $keterangan = ($rata >= 75) ? "Lulus" : "Tidak Lulus";

      echo "<h3>Hasil Perhitungan:</h3>";
      echo "<p>Nilai rata-rata: <strong>" . number_format($rata, 2) . "</strong></p>";
      echo "<p>Keterangan: <strong>$keterangan</strong></p>";
  }
  ?>
</body>
</html>
