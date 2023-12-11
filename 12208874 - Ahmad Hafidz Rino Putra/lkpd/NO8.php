<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        Bilangan
        <input type="number" name="bil">
        <input type="submit" value="send" name="kirim">
    </form>
</body>

<?php 


if(isset($_POST['kirim'])) {
    $bil = $_POST['bil'];

    $satuan = $bil % 10;
    $puluhan = ( $bil / 10) % 10;
    $ratusan = (int)($bil / 100);

    echo "adalah satuan ".$satuan.'<br>'.
    "adalah puluhan " .$puluhan .'<br>'.
    "adalah ratusan " .$ratusan . '<br>';

}