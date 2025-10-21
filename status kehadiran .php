<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas 3 - Status Kehadiran Karyawan</title>
</head>
<body>

<h2 align="center">Tugas 3 - Menentukan Status Kehadiran Karyawan</h2>

<form method="post" action="" align="center">
    <label for="jumlah">Pilih Jumlah Karyawan yang Akan Ditampilkan:</label>
    <select name="jumlah" id="jumlah" required>
        <option value="" disabled selected>-- Pilih Jumlah --</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <button type="submit" name="tampil">Tampilkan Kehadiran</button>
</form>

<br>

<?php
if (isset($_POST['tampil'])) {
    // Daftar nama karyawan
    $karyawan = ["Andi", "Budi", "Citra", "Dodi", "Eka"];

    // Ambil jumlah karyawan yang dipilih
    $jumlah = $_POST['jumlah'];

    echo "<table border='1' align='center' cellpadding='5' cellspacing='0'>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Status Kehadiran</th>
            </tr>";

    // Perulangan for untuk menampilkan data
    for ($i = 0; $i < $jumlah; $i++) {
        // Tentukan status kehadiran
        if (($i + 1) % 2 == 0) {
            $status = "Hadir";
        } else {
            $status = "Izin";
        }

        echo "<tr>
                <td>" . ($i + 1) . "</td>
                <td>" . $karyawan[$i] . "</td>
                <td>$status</td>
              </tr>";
    }

    echo "</table>";
}
?>

</body>
</html>
