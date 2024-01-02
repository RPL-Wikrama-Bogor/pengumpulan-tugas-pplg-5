<!DOCTYPE html>
<html>
<head>
    <title>Konversi Total Detik ke Jam-Menit-Detik</title>
</head>
<body>
    <h1>Konversi Total Detik ke Jam-Menit-Detik</h1>
    
    <form method="post" action="">
        <label for="total_detik">Total Detik:</label>
        <input type="number" id="total_detik" name="total_detik" min="0"><br>
        <link rel="stylesheet" href="style.css">
        <input type="submit" name="konversi" value="Konversi">
    </form>
    



    
    <?php
    if (isset($_POST['konversi'])) {
        $total_detik = $_POST['total_detik'];

        $jam = floor($total_detik / 3600);
        $sisa_detik = $total_detik % 3600;
        $menit = floor($sisa_detik / 60);
        $detik = $sisa_detik % 60;

        echo "<h2>Hasil Konversi</h2>";
        echo "Total Detik: " . $total_detik . " detik<br>";
        echo "Jam: " . $jam . "<br>";
        echo "Menit: " . $menit . "<br>";
        echo "Detik: " . $detik . "<br>";
        
    }
    ?>
</body>
</html>
