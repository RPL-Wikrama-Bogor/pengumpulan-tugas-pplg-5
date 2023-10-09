<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>empat</title>
</head>
<body>
    <center>
        <h2>NO 4</h2>
    <form action="" method="post">
    <input type="text" name="nama" placeholder="Isi nama anda"><br></br>
    <input type="number" name="gaji_pokok" placeholder="Gaji"><br></br>
    <button name="submit">PENCET</button><br></br>
</body>
</form>
</html>

<?php

if (isset($_POST['submit'])){

$nama = $_POST['nama'];
$gaji_pokok =$_POST['gaji_pokok'];

$tunj =(20* $gaji_pokok)/100;
$pjk =  (15*($gaji_pokok+$tunj))/100;
$gaji_bersih = $gaji_pokok+ $tunj - $pjk;


echo"Nama anda: ".$nama. "<br>";
echo"Gaji Pokok:" .$gaji_pokok. "<br>";
echo"Tunjangan: ".$tunj. "<br>";
echo"Pajak: ".$pjk. "<br>";
echo"Gaji bersih: ".$gaji_bersih. "<br>";

}


?>
</center>