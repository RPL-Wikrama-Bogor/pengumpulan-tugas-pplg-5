<!DOCTYPE html>
<html>
<head>
    <title>Konversi Jam-Menit-Detik ke Total Detik</title>
</head>
<body>

<h2>Konversi Jam-Menit-Detik ke Total Detik</h2>

<form method="post" action="">
    <label for="jam">Jam:</label>
    <input type="number" id="jam" name="jam" min="0"><br><br>
    
    <label for="menit">Menit:</label>
    <input type="number" id="menit" name="menit" min="0" max="59"><br><br>
    
    <label for="detik">Detik:</label>
    <input type="number" id="detik" name="detik" min="0" max="59"><br><br>
    
    <input type="submit" value="Konversi">
    <br>
    <a href="soal-no-4.php">Soal Sebelumnya</a>
    <br>
    <a href="soal-no-6.php">Soal Berikutnya</a>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jam = $_POST["jam"];
    $menit = $_POST["menit"];
    $detik = $_POST["detik"];

    // Menghitung total detik
    $total = ($jam * 3600) + ($menit * 60) + $detik;

    // Menampilkan hasil
    echo "<h3>Hasil Konversi:</h3>";
    echo "Total Detik: " . $total . " detik<br>";
}
?>

</body>
</html>
