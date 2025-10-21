<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tugas 2 - Menghitung Total Harga Belanja dan Diskon</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }
    table {
      border-collapse: collapse;
      width: 70%;
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
      padding: 6px 10px;
      font-size: 14px;
    }
  </style>
</head>
<body>

<h2>Tugas 2 - Menghitung Total Harga Belanja dan Diskon</h2>

<form method="post" action="">
  <table style="width:50%; margin:auto; text-align:center;">
    <tr>
      <th>No</th>
      <th>Pilih Harga Barang</th>
    </tr>
    <?php
    // Menampilkan 5 dropdown untuk 5 barang
    for ($i = 1; $i <= 5; $i++) {
      echo "<tr>
              <td>$i</td>
              <td>
                <select name='harga[]' required>
                  <option value='' disabled selected>-- Pilih Harga --</option>
                  <option value='10000'>Rp 10.000</option>
                  <option value='12000'>Rp 12.000</option>
                  <option value='15000'>Rp 15.000</option>
                  <option value='30000'>Rp 30.000</option>
                  <option value='50000'>Rp 50.000</option>
                </select>
              </td>
            </tr>";
    }
    ?>
  </table>
  <br>
  <button type="submit" name="tambah">Tampilkan Tabel Belanja</button>
  <button type="submit" name="reset">Reset Tabel</button>
</form>

<?php
// Jika tombol reset ditekan
if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Jika tombol tambah ditekan
if (isset($_POST['tambah'])) {
    $_SESSION['barang'] = $_POST['harga'];
}

// Jika ada data di session, tampilkan tabel hasil
if (isset($_SESSION['barang']) && count($_SESSION['barang']) > 0) {
    echo "<h3>Hasil Perhitungan Harga dan Diskon</h3>";
    echo "<table>
            <tr>
              <th>No</th>
              <th>Harga Barang (Rp)</th>
              <th>Diskon</th>
              <th>Harga Setelah Diskon (Rp)</th>
            </tr>";

    $no = 1;
    $total_akhir = 0;

    foreach ($_SESSION['barang'] as $harga) {
        // Hitung diskon 10% jika harga di atas 30.000
        if ($harga > 30000) {
            $diskon = 0.10 * $harga;
            $harga_setelah_diskon = $harga - $diskon;
            $ket_diskon = "10%";
        } else {
            $diskon = 0;
            $harga_setelah_diskon = $harga;
            $ket_diskon = "-";
        }

        echo "<tr>
                <td>$no</td>
                <td>" . number_format($harga, 0, ',', '.') . "</td>
                <td>$ket_diskon</td>
                <td>" . number_format($harga_setelah_diskon, 0, ',', '.') . "</td>
              </tr>";

        $total_akhir += $harga_setelah_diskon;
        $no++;
    }

    echo "<tr>
            <th colspan='3'>Total Harga Akhir</th>
            <th>Rp " . number_format($total_akhir, 0, ',', '.') . "</th>
          </tr>
          </table>";
}
?>

</body>
</html>
