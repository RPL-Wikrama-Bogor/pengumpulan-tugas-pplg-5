<!DOCTYPE html>
<html>
<head>
    <title>Konversi Total Detik ke Jam-Menit-Detik</title>
</head>
<body>

<h2>Konversi Total Detik ke Jam-Menit-Detik</h2>

<form method="post" action="">
    <label for="total_detik">Total Detik:</label>
    <input type="number" id="total_detik" name="total_detik" min="0"><br><br>
    <input type="submit" value="Konversi"><br>
    <a href="soal-no-5.php">Soal Sebelumnya</a>
    <br>
    <a href="soal-no-7.php">Soal Berikutnya</a>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $total_detik = $_POST["total_detik"];

    // Menghitung jam, menit, dan detik
    $jam = floor($total_detik / 3600);
    $sisa_detik = $total_detik % 3600;
    $menit = floor($sisa_detik / 60);
    $detik = $sisa_detik % 60;

    // Menampilkan hasil
    echo "<h3>Hasil Konversi:</h3>";
    echo "Total Detik: " . $total_detik . " detik<br>";
    echo "Hasil Konversi: " . $jam . " jam " . $menit . " menit " . $detik . " detik<br>";
}
?>

</body>
</html>
