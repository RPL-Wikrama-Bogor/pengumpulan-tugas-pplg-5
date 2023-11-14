<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <label for="angka">angka</label>
        <input type="number" name="angka"><br><br>
        
            <button name="submit">Submit</button> <br>

    </form>
</body>


<?php

if (isset($_POST['submit'])) {
    # code...

$s;
$r;
$p;
$angka;

$angka = $_POST['angka'];

Echo $angka . "adalah angkanya " . "<br>";
$s = $angka % 10;
$i = $angka - $s;
$p = $i % 100/10;
$a = $angka - ($p+$s);
$r = $angka%1000/100;
$r= floor($r);

echo $s ." satuan " . "<br>";
echo $p ." puluhan " . "<br>";
echo $r ." ratusan " . "<br>";

}
// ?>