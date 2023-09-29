<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Gaji Karyawan</title>
</head>
<body>

<h2>Kalkulator Gaji Karyawan</h2>

<form method="post" action="">
    <label for="nama">Nama Karyawan:</label>
    <input type="text" id="nama" name="nama"><br><br>
    
    <label for="gaji">Gaji Pokok:</label>
    <input type="number" id="gaji" name="gaji"><br><br>
    <input type="submit" value="Hitung">
    <br>
    <br>
    <a href="soal-no-5.php">Soal berikutnya</a>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $gaji_pokok = $_POST["gaji"];

    // Menghitung tunjangan
    $tunj = 0.2 * $gaji_pokok;

    // Menghitung pajak
    $pjk = 0.15 * ($gaji_pokok + $tunj);

    // Menghitung gaji bersih
    $gaji_bersih = $gaji_pokok + $tunj - $pjk;

    // Menampilkan hasil
    echo "<h3>Hasil Perhitungan Gaji:</h3>";
    echo "Nama Karyawan: " . $nama . "<br>";
    echo "Besar Tunjangan: " . $tunj . "<br>";
    echo "Pajak: " . $pjk . "<br>";
    echo "Gaji Bersih: " . $gaji_bersih . "<br>";
}
?>

</body>
</html>
