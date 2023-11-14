<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Harga Buah Jeruk</title>
</head>
<body>
    <h1>Kalkulator Harga Buah Jeruk</h1>    
    
    <form method="post" action="">
        Masukkan berat buah jeruk dalam gram: <input type="text" name="berat" required><br>
        <input type="submit" name="hitung" value="Hitung"><br>
        <a href="soal-no-6.php">Soal Sebelumnya</a>
    </form>

    <?php
    
    $harga_per_100_gram = 500;

    if (isset($_POST['hitung'])) {
        $berat_buah_gram = floatval($_POST['berat']);

        $harga_total_sebelum_diskon = ($berat_buah_gram / 100) * $harga_per_100_gram;

        $diskon = 0.05 * $harga_total_sebelum_diskon;

        $harga_total_setelah_diskon = $harga_total_sebelum_diskon - $diskon;

        // Menampilkan hasil
        echo "<h2>Hasil Perhitungan:</h2>";
        echo "Total harga sebelum diskon: " . number_format($harga_total_sebelum_diskon, 2) . " rupiah<br>";
        echo "Diskon: " . number_format($diskon, 2) . " rupiah<br>";
        echo "Total harga setelah diskon: " . number_format($harga_total_setelah_diskon, 2) . " rupiah<br>";
    }
    ?>
</body>
</html>
