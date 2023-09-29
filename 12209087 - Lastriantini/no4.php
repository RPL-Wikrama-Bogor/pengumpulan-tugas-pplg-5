<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <label for="nama">
            <p>input Nama</p>
            <input type="text" name="nama"><br><br>
        <label for="gaji_pokok">
            <p>input Gaji Pokok</p>
            <input type="number" name="gaji_pokok"><br><br>
        <button name="submit">Submit</button> <br>
    </form>
</body>
</html>
<?php

if(isset($_POST['submit'])){
    
    $nama = $_POST['nama'];
    $gaji_pokok = $_POST['gaji_pokok'];
    echo "nama : " . $nama . "</br>";
    echo "gaji pokok : " . $gaji_pokok . "</br>";
    echo "tunjangan : ". $tunj = (20 * $gaji_pokok)/100 . "</br>";
    echo "pajak : " . $pjk = (15 * ($gaji_pokok + $tunj))/100 . "</br>";
    echo "gaji bersih: " . $gaji_bersih = $gaji_pokok + $tunj - $pjk;

}