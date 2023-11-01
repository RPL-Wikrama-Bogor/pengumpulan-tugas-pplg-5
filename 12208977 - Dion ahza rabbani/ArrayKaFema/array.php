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

echo "Uang ditabungan saya adalah: ". implode(",",$awal) . "<br>";
echo "Jumlah: " . $jumlah . "<br>";
echo "Nilai Yang sama: ".implode(",",$sama);
echo "<br>";
echo "Nilai Terkecil: " . $kecil . "<br>";
echo "Nilai Terbesar: " . $besar . "<br>";
echo "Urutan Terkecil ke Terbesar: " . implode(", ", $terkesar) . "<br>";
echo "Urutan Terbesar ke Terkecil: " . implode(", ", $terbecil) . "<br>";
echo "Mengganti <b>50000</b> menjadi <b>100000</b>: ". implode(",",$ganti)."<br>";
echo "Hari ini saya menabung sebesar<b>20000</b>maka kini uang tabungan saya: ". implode(",",$ray)."<br>";
echo "tabungan sekarang:  ". implode(",",$ray)."<br>";
echo "jumlah tabungan sekarang adalah: ".array_sum($ray);

