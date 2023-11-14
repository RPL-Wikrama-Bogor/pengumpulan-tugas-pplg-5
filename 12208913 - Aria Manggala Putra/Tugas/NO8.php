<!DOCTYPE html>
<html>
<head>
    <title>Nomer 8</title>
</head>
<body>
    <form action="" method="post">
        <label for="bilangan">Masukkan bilangan bulat:</label>
        <input type="number" name="bilangan" id="bilangan" required>
        <br>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bilangan = intval($_POST["bilangan"]);

        // Ambil angka satuan, puluhan, dan ratusan
        $satuan = $bilangan % 10;
        $puluhan = floor(($bilangan % 100) / 10);
        $ratusan = floor($bilangan / 100);

        echo "<h3>Hasil :</h3>";
        echo "Angka ratusan: $ratusan<br>";
        echo "Angka puluhan: $puluhan<br>";
        echo "Angka satuan: $satuan<br>";
    }
    ?>
    <style></style>
</body>
</html>
