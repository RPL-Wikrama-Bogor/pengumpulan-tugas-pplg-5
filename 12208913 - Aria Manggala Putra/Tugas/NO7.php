<!DOCTYPE html>
<html>
<head>
    <title>Nomer 7</title>
</head>
<body>
    <form action="" method="post">
        <label for="totalGram">Masukkan total gram jeruk:</label>
        <input type="number" name="totalGram" id="totalGram" required>
        <br>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $totalGram = floatval($_POST["totalGram"]);
        $hargaPer100Gram = 500;

        // Menghitung total harga sebelum diskon
        $totalHargaSebelumDiskon = $totalGram * $hargaPer100Gram / 100;

        // Menghitung diskon (5%)
        $diskon = 0.05 * $totalHargaSebelumDiskon;

        // Menghitung total harga setelah diskon
        $totalHargaSetelahDiskon = $totalHargaSebelumDiskon - $diskon;

        echo "<h3>Hasil perhitungan:</h3>";
        echo "Total harga sebelum diskon: " . number_format($totalHargaSebelumDiskon) . " rupiah<br>";
        echo "Diskon: " . number_format($diskon) . " rupiah<br>";
        echo "Total harga setelah diskon: " . number_format($totalHargaSetelahDiskon) . " rupiah<br>";
    }
    ?>
</body>
</html>
