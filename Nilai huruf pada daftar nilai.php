<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas 4 - Memberi Nilai Huruf pada Daftar Nilai</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 40px auto;
            text-align: center;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Tugas 4 - Memberi Nilai Huruf pada Daftar Nilai</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nilai Angka</th>
        <th>Nilai Huruf</th>
    </tr>

<?php
// Array nilai karyawan
$nilai = [60, 85, 70, 90, 50];

// Nomor urut
$no = 1;

// Perulangan untuk menentukan nilai huruf
foreach ($nilai as $n) {
    if ($n >= 85) {
        $huruf = "A (Sangat Baik)";
    } elseif ($n >= 70 && $n <= 84) {
        $huruf = "B (Baik)";
    } elseif ($n >= 60 && $n <= 69) {
        $huruf = "C (Cukup)";
    } else {
        $huruf = "D (Kurang)";
    }

    echo "<tr>
            <td>$no</td>
            <td>$n</td>
            <td>$huruf</td>
          </tr>";

    $no++;
}
?>

</table>

</body>
</html>
