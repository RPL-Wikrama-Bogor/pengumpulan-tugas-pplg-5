<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        bilangan
        <input type="number" name="bil">
        <input type="submit" value="kirim" name="kirim">
        <br>
        <a href="soal-no-7.php">Soal Sebelumnya</a>
        <br>
        <a href="soal-no-9.php">Soal Berikutnya</a>
    </form>

    <?php
    
    if(isset($_POST['kirim'])){
        $bil = $_POST["bil"];

        $satuan = $bil % 10;
        $puluhan = (int) (($bil % 100) / 10);
        $ratusan = (int) ($bil / 100);

        echo "Angka satuan: $satuan <br>";
        echo "Angka puluhan: $puluhan <br>";
        echo "Angka ratusan: $ratusan <br>";

    }
    ?>
</body>
</html>