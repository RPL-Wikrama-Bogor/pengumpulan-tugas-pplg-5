<!DOCTYPE html>
<html>
<head>
    <title>Analisis Angka Satuan, Puluhan, dan Ratusan</title>
</head>
<body>
    <h1>Analisis Angka Satuan, Puluhan, dan Ratusan</h1>
    
    <form method="post" action="">
        <label for="bilangan">Masukkan Bilangan Bulat:</label>
        <input type="number" id="bilangan" name="bilangan" min="0"><br>
        
        <input type="submit" name="analisis" value="Analisis">
    </form>
    
    
    <title>Gambar sebagai Latar Belakang dengan PHP</title>
    
</body>
</html>

    <?php




    if (isset($_POST['analisis'])) {
        $bilangan = $_POST['bilangan'];

        $satuan = $bilangan % 10;
        $puluhan = floor(($bilangan % 100) / 10);
        $ratusan = floor($bilangan / 100);

        echo "<h2>Hasil Analisis</h2>";
        echo "Angka Satuan: " . $satuan . "<br>";
        echo "Angka Puluhan: " . $puluhan . "<br>";
        echo "Angka Ratusan: " . $ratusan . "<br>";
       
    }
    ?>
</body>
</html>
