<?php
$uang = [10000, 50000,  10000, 5000, 20000, 5000, 50000, 20000];
$kalimat = implode(", ",$uang);
echo "Uang yang terdapat di tabungan saya adalah ". $kalimat;
echo "<br> Jumlah tabungan saya adalah " . array_sum($uang);
$uangArr = array_unique($uang);
$uangs = array_values($uangArr);
echo "<br> Didalam tabungan saya terdapat uang pecahan ";
foreach ($uangs as $money) {
    echo $money . ", ";
};
echo "<Br> Pecahan uang terkecil adalah ". $min = min($uang);
echo "<Br> Pecahan uang terbesar adalah ". $max = max($uang);

echo "<br> Jika diurutkan dari yang terkecil maka uang yang berada di tabungan adalah ";
$uangarr = $uang;
asort($uangarr);
echo $kalimat = implode(", ",$uangarr);

echo "<br> Jika diurutkan dari yang terbesar maka uang yang berada di tabungan adalah ";
$arruang = $uang;
arsort($arruang);
echo $kalimat = implode(", ",$arruang);

echo "<br> Saya igin mengganti pecahan 50000 menjadi 100000, maka uang yang berada di tabungan menjadi ";
$index2 = array_search(50000, $uang, true);
array_splice($uang, $index2, 1, "100000");
$index = array_search(50000, $uang);
unset($uang[$index]);

echo $kalimat = implode(", ",$uang);

array_push($uang, 20000);
$kalimat = implode(", ",$uang);
echo "<br> Hari ini saya menabung sebesar 20000, maka kini uang yagn berada di tabungan saya adalah ". $kalimat;
echo "<br> Jika diurutkan dari yang terkecil kini tabungan saya adalah ";
$arruang = $uang;
asort($arruang);
echo $kalimat = implode(", ",$arruang);
echo "<br> Maka jumlah tabungan saya saat ini adalah ". array_sum($uang);

