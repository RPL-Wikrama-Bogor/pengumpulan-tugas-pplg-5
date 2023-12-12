<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><form action="" method="post">
    <input type="text" name="vip" placeholder="Masukan tiket VIP"><br>
    <input type="text" name="eks" placeholder="Masukan tiket Eksekutif"><br>
    <input type="text" name="eko" placeholder="Masukan tiket Ekonomi"><br>
    <button name="submit">Submit</button>
</body>
</form>
</html>
<?php

if(isset($_POST['submit'])){
 $vip=$_POST['vip'];
 $eks=$_POST['eks'];
 $eko=$_POST['eko'];
 $jumlah=$vip+$eko+$eks;
 $hasil;

 if($jumlah<=50) {
    $vip=$eks+$jumlah;
    if($vip>=35){
        $vip=$vip*0.25;
    }elseif($vip<35 && $vip>=20){
        $vip=$vip*0.15;
    }else{
        $vip=$vip*0.05;
    }

 

    $eks=$eks+$jumlah;
    if($eks>=40){
        $eks=$eks*0.2;
    }elseif($eks >= 20 && $eks <40){
        $eks=$eks*0.1;
    }else{
        $eks=$eks*0.01;
    }

    $eko=($eko+$jumlah)*0.07;
    $hasil=$vip+$eks+$eko;
 echo "jumlah  keuntungan VIP= ".$vip."%<br>";
 echo "jumlah keuntungan Eksekutif= ".$eks."%<br>";
 echo "jumlah keuntungan Ekonomi= ".$vip."%<br>";
 echo "jumlah keuntungan= ".$hasil."%<br>";
 echo "total tiket= ".$jumlah;
 }else{
    echo "tiket lebih dari 50 ";
 }
 



}