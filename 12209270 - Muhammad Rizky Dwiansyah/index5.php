<!DOCTYPE html>
<html>
<head>
    <title>Konversi Jam-Menit-Detik ke Total Detik</title>
</head>
<body>
    <h1>Konversi Jam-Menit-Detik ke Total Detik</h1>
    
    <form method="post" action="">
        <label for="jam">Jam:</label>
        <input type="number" id="jam" name="jam" min="0"><br>
        
        <label for="menit">Menit:</label>
        <input type="number" id="menit" name="menit" min="0" max="99999"><br>
        
        <label for="detik">Detik:</label>
        <input type="number" id="detik" name="detik" min="0" max="99999"><br>
        
        <input type="submit" name="konversi" value="Konversi">
    </form>
    
    
    <?php
    if (isset($_POST['konversi'])) {
        $jam = $_POST['jam'];
        $menit = $_POST['menit'];
        $detik = $_POST['detik'];

        $total_detik = $jam * 3600 + $menit * 60 + $detik;

        echo "<h2>Hasil Konversi</h2>";
        echo "Jam: " . $jam . "<br>";
        echo "Menit: " . $menit . "<br>";
        echo "Detik: " . $detik . "<br>";
        echo "Total Detik: " . $total_detik . " detik<br>";
    }
    ?>
</body>
</html>
