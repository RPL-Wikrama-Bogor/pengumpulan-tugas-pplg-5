<?php

$nama = "Jesen";
$gaji_pokok = "1000000";

$tunj = (20* $gaji_pokok)/100;
$pjk = (15*($gaji_pokok+$tunj))/100;
$gaji_bersih = $gaji_pokok + $tunj - $pjk;

echo "<h1>NO 4</h1>";
echo "Nama Anda = ", $nama ;
echo "<br>";
echo "Tunjangan = ",$tunj;
echo "<br>";
echo "Pajak = ",$pjk ;
echo "<br>";
echo  "gaji bersih =",$gaji_bersih;


?>