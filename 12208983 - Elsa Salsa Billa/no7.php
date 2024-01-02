<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator</title>
</head>
<body>
    <center>
    <h1>Harga Buah Jeruk</h1>
    <form action="" method="post">
        <label for="berat_gram">Berat(g):</label>
        <input type="number" name="berat" step="any" required><br>
        <br>
        <input type="submit" value="Hitung">
    </form>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $berat = floatval($_POST["berat"]);
    
    $harga = 500; // Harga per 100 gram
    $berat_kg = $berat / 1000;
    
    $sebelum_diskon = $harga * $berat_kg;
    $diskon = 0.05 * $sebelum_diskon;
    $setelah_diskon = $sebelum_diskon - $diskon;
    
    echo "Total Harga Sebelum Diskon: " . $sebelum_diskon . " rupiah<br>";
    echo "Diskon: " . $diskon . " rupiah<br>";
    echo "Total Harga Setelah Diskon: " . $setelah_diskon . " rupiah";
}
?>