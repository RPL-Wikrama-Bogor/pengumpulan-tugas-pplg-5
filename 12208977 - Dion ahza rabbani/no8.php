<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<form action=""method="post">
    <h1>Nomer 8</h1>
<body>
    <input type="number"name="bil" placeholder="masukan angka!!">
    <button name="submit">submit</button>
</body></form>
</html>
<?php

if(isset($_POST['submit'])){
    $bil=$_POST['bil'];
    $satuan;
    $puluhan;
    $ratusan;

    $satuan=$bil%10;
    $puluhan=($bil/10)%10;
    $ratusan=($bil/100)%10;

    echo "Bilangan=".$bil."<br>";
    echo "Satuan=".$satuan."<br>";
    echo "Puluhan=".$puluhan."<br>";
    echo "ratusan=".$ratusan."<br>";

}