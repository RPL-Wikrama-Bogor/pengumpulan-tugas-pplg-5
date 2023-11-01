<?php
function konversi_fahrenheit_ke_celsius($suhu_fahrenheit) {
    $suhu_celsius = ($suhu_fahrenheit - 32) * 5/9;
    return $suhu_celsius;
}

function analisis_cuaca($suhu_celsius) {
    if ($suhu_celsius > 30) {
        return "panas";
    } elseif ($suhu_celsius < 10) {
        return "dingin";
    } else {
        return "normal";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $suhu_fahrenheit = floatval($_POST["suhu"]);
    $suhu_celsius = konversi_fahrenheit_ke_celsius($suhu_fahrenheit);
    $hasil_analisis_cuaca = analisis_cuaca($suhu_celsius);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Analisis Cuaca</title>
</head>
<body>
    <h2>Analisis Cuaca</h2>
    <form method="post" action="">
        Masukkan suhu: <input type="text" name="suhu" required>
        <input type="submit" value="Analisis">
        <br>
        <a href="soal-no-8.php">Soal Sebelumnya</a>
        <br>
        <a href="soal-no-10.php">Soal Berikutnya</a>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <p>Suhu dalam Celsius: <?php echo number_format($suhu_celsius, 2); ?>°C</p>
        <p>Kondisi cuaca: <?php echo $hasil_analisis_cuaca; ?></p>
    <?php } ?>
</body>
</html>
