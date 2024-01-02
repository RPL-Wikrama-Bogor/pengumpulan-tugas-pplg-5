<?php

$bilangan;
$satuan;
$puluhan;
$ratusan;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>NO 8</h1>

<body>

    <form action="" method="post">

        <label for="">Input Bilangan :</label>
        <input type="number" name="bilangan" id="">

        <br>
        <input type="submit" value="cari" name="submit">
    </form>

    <?php
if(isset($_POST['submit'])){
   $bilangan = $_POST['bilangan'];

   $satuan = $bilangan % 10;
   $puluhan = ($bilangan / 10) % 10;
   $ratusan = ($bilangan / 100)%10;

   echo" $satuan satuan, $puluhan puluhan, $ratusan ratusan";
}
?>
</body>

</html>