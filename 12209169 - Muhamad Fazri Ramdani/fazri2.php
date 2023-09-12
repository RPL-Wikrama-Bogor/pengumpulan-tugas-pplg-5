<?php

$ar = [10000,50000,10000,5000,20000,5000,50000,20000];
$awal = [10000,50000,10000,5000,20000,5000,50000,20000];
$ray = [10000,50000,10000,5000,20000,5000,50000,20000];



$jumlah = array_sum($ar);
$sama = array_unique($ar);
$kecil =min($ar);
$besar=max($ar);
sort($ar);
$terkesar = $ar;
rsort($ar);
$terbecil=$ar;
array_splice($ray,1,1,100000);
array_splice($ray,6,1,);
$ganti = $ray;
array_unshift($ray,20000); 
sort($ray);
$skrng=$ray;

echo "Uang yang di terdapat di tabungan saya adalah : ". implode(",",$awal) . "<br>";
echo "Jumlah tabungan saya adalah: " . $jumlah . "<br>";
echo "didalam tabungan saya terdapat uang pecahan: ".implode(",",$sama);
echo "<br>";
echo "pecahan uang Terkecil adalah: " . $kecil . "<br>";
echo "pecahan uang Terbesar adalah: " . $besar . "<br>";
echo "jika di urutan dari yang terkecil maka uang yang berada di tabungan adalah: " . implode(", ", $terkesar) . "<br>";
echo "jika diurutkan dari yang terbesar maka uang yang berada di tabungan adalah: " . implode(", ", $terbecil) . "<br>";
echo "saya ingin mengganti pecahan <b>50000</b> yang ada di tabungan menjadi <b>100000</b> maka uang yang di tabungan menjadi: ". implode(",",$ganti)."<br>";
echo "Hari ini saya menabung sebesar<b>20000</b>maka kini uang tabungan saya: ". implode(",",$ray)."<br>";
echo "tabungan sekarang:  ". implode(",",$ray)."<br>";
echo "jumlah tabungan sekarang adalah: ".array_sum($ray);