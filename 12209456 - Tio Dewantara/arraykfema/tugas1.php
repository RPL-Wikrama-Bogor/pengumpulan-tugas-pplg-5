<?php
$tabungan=[10000 , 50000, 10000, 5000,20000, 5000, 50000, 20000];
$koma = implode(", ",$tabungan);
$junmlah = array_sum($tabungan);
$pecahan = array_unique($tabungan);
$min = min($tabungan);
$max = max($tabungan);
arsort($tabungan);
$terbesar= $tabungan;
 asort($tabungan);
$terkecil =$tabungan;
array_splice($tabungan,0,1,100000);
array_splice($tabungan,6,1,);
 $ganti = $tabungan;    
array_unshift($tabungan,20000); 
sort($tabungan);
 $sekarang=$tabungan;



echo "Uang yang terdapat ditabungan saya adalah  "."<b>".$koma ."</b>"."<br>";
echo "Jumlah tabungan saya adalah ". $junmlah."<br>";
echo "Didalam tabungan saya terdapat pecahan "  . implode(", ",$pecahan). "<br>";
echo "Pecahan uang terkecil adalah ".$min."<br>";
echo "Pecahan uang terbesar adalah ".$max. "<br>";
echo "Jika diurutkan dari yang terkecil maka uang yang ada ditabungan adalah ". implode(", ",$terkecil).  "<br>";
echo "Jika diurutkan dari yang terbesar maka uang yang ada ditabungan adalah ". implode(", ",$terbesar).  "<br>";
echo "Saya ingin merubah pecahan 50000 yang ada ditabungan menjadi 100000,maka uang yang berada di tabunga menjadi ". implode(", ", $tabungan).  "<br>";
echo "Hari ini saya menabung sebesar 20000 maka kini uang tabungan saya: ". implode(",",$tabungan)."<br>";
echo "tabungan sekarang:  ". implode(",",$tabungan)."<br>";
echo "jumlah tabungan sekarang adalah: ".array_sum($tabungan);

?>