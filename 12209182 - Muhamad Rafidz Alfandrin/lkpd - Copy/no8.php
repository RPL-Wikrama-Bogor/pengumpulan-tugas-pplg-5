<!DOCTYPE html>
<html>
<head>
    <title>Bilangan bulat</title>
</head>
<body>
    <h1>Input bilangan bulat</h1>
    <form action="" method="post">
        <label for="bilangan">Bilangan:</label>
        <input type="number" name="bilangan" required><br>
        <br>
        <input type="submit" value="Input">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $bilangan = intval($_POST["bilangan"]);

    $satuan = $bilangan % 10;
    $puluhan =  (int) ($bilangan /10) %10;
    $ratusan = (int) ($bilangan /100);

    echo "hasil bilangan: " . $ratusan . "ratusan" . $puluhan . "puluhan" . $satuan . "satuan";
}
?>
