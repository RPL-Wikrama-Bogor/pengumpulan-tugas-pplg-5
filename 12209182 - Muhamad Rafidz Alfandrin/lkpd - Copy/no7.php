<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Harga Buah Jeruk</title>
</head>
<body>
    <h1>Kalkulator Harga Buah Jeruk</h1>
    <form action="" method="post">
        <label for="berat_gram">Berat (gram):</label>
        <input type="number" name="berat_gram" step="any" required><br>
        <br>
        <input type="submit" value="Hitung Harga">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $berat_gram = floatval($_POST["berat_gram"]);
    
    $harga_per_kg = 500; // Harga per 100 gram
    $berat_kg = $berat_gram / 1000;
    
    $total_sebelum_diskon = $harga_per_kg * $berat_kg;
    $diskon = 0.05 * $total_sebelum_diskon;
    $total_setelah_diskon = $total_sebelum_diskon - $diskon;
    
    echo "Total Harga Sebelum Diskon: " . $total_sebelum_diskon . " rupiah<br>";
    echo "Diskon: " . $diskon . " rupiah<br>";
    echo "Total Harga Setelah Diskon: " . $total_setelah_diskon . " rupiah";
}
?>
