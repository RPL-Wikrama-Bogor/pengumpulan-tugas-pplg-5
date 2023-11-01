<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <input type="number" name="bilangan" id="" placeholder="Masukan bilangan"> <br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
<?php
    if ($_SERVER ['REQUEST_METHOD'] == "POST") {
        $bl = $_POST['bilangan'] ;

        $satuan = $bl % 10;
        $puluhan = (($bl - $satuan) % 100) / 10;
        $ratusan = ($bl - $puluhan * 10 - $satuan) / 100;

        echo " <br> Satuan: $satuan <br>";
        echo "Puluhan: $puluhan <br>";
        echo "Ratusan: $ratusan <br>";
    }
?>