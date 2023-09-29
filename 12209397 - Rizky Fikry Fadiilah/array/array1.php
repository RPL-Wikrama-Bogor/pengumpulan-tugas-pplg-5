<?php
$tabungan=[10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];
$koma = implode(", ",$tabungan);
$jumlah = array_sum($tabungan);
$pecahan = array_unique($tabungan);
$kecil = min($tabungan);
$besar = max($tabungan);
arsort($tabungan);
$terkecil = $tabungan;
arsort($tabungan);
$terbesar = $tabungan;
array_splice($tabungan, 0,1,100000);
array_splice($tabungan ,6,1);
// $ganti=$tabungan;
array_unshift($tabungan,20000); 
sort($tabungan);
$skrng=$tabungan;

echo "Uang yang terdapat ditabungan saya adalah " ."<b>".$koma ."</b>"  ."<br>";
echo "Jumlah tabungan saya adalah " ."<b>".$jumlah ."</b>" ."<br>";
echo "Didalam tabungan saya terdapat pecahan "."<b>"  .implode (", ",$pecahan)."</b>" ."<br>";
echo "Pecahan uang terkecil adalah " ."<b>".$kecil  ."</b>" ."<br>";
echo "Pecahan uang terbesar adalah " ."<b>".$besar ."</b>" ."<br>";
echo "Jika diurutkan dari yang terkecil maka uang yang ada ditabungan adalah "."<b>".implode (", ",$terkecil )."</b>". "<br>";
echo "Jika diurutkan dari yang terbesar maka uang yang ada ditabungan adalah "."<b>".implode (", ",$terbesar )."</b>". "<br>";
echo "Saya ingin merubah pecahan <b>50000</b> yang ada ditabungan menjadi <b>100000</b>, maka uang yang berada ditabungan menjadi "."<b>" .implode(", ",$tabungan)."</b>"."<br>";
echo "Hari ini saya menabung sebesar<b>20000</b>maka kini uang tabungan saya "."<b>". implode(",",$tabungan)."</b>"."<br>";
echo "tabungan sekarang  "."<b>". implode(",",$tabungan)."</b>"."<br>";
echo "jumlah tabungan sekarang adalah "."<b>".array_sum($tabungan);
?> 