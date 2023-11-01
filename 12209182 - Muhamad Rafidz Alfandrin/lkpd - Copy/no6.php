<!DOCTYPE html>
<html>
<head>
    <title>Konversi Detik ke Waktu</title>
</head>
<body>
    <h1>Konversi Detik ke Waktu</h1>
    <form action="" method="post">
        <label for="total_detik">Total Detik:</label>
        <input type="number" name="total_detik" required><br>
        <input type="submit" value="Konversi">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $total_detik = intval($_POST["total_detik"]);
    
    $jam = floor($total_detik / 3600);
    $sisa_detik = $total_detik % 3600;
    $menit = floor($sisa_detik / 60);
    $detik = $sisa_detik % 60;
    
    echo "Hasil Konversi: " . $jam . " jam " . $menit . " menit " . $detik . " detik";
}
?>
