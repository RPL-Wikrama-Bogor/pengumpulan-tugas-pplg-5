<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        total gram 
        <input type="number" name="gr">
        <input type="submit" value="send" name="kirim">
    </form>
</body>
</html>

<?php 


if(isset($_POST['kirim'])){
    $gram = $_POST['gr'];

    $harga_sebelum = 5 * $gram;
    $diskon = 5 * $harga_sebelum / 100;
    $harga_setelah = $harga_sebelum - $diskon;

    echo "Harga sebelumnya adalah ". $harga_sebelum; 
    echo "<br> Diskonnya adalah " . $diskon ; 
    echo "<br> Harga setelah didiskon adalah " . $harga_setelah;

}