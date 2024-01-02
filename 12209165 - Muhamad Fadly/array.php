<?php

$tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];

//tampil semua
$tampil= implode(",",$tabungan);
echo "uang yang terdapat di tabungan saya adalah<b> $tampil</b>";
echo "<br>";
echo "<br>";
//dijumlahkan
$jumlah = array_sum($tabungan);
echo "jumlah tabungan saya adalah <b> $jumlah</b>";
echo "<br>";
echo "<br>";
//pecahan
$pecahan = array_unique($tabungan);
echo "didalam tabungan saya terdapat pecahan uang <b>".implode(",",$pecahan)."</b>";
echo "<br>";
echo "<br>";
//min
$min= min($tabungan);
echo"Uang terkecil dari tabungan saya adalah<b> $min</b>";
echo "<br>";
echo "<br>";
//max
$max= max($tabungan);
echo"Uang terbesar dari tabungan saya adalah<b> $max</b>";
echo "<br>";
echo "<br>";
//urutkan dari terkeceil
$tabungan_baru = $tabungan;
asort($tabungan_baru);
echo "jika di urutkan dari terkecil maka uang yang berada di tabungan adalah <b>" .implode(",",$tabungan_baru)."</b>";
echo "<br>";
echo "<br>";
//urutkan dari terbesar
arsort($tabungan_baru);
echo "Jika di urutkan dari terbesar maka uang yang berada di tabungan adalah <b>".implode(",",$tabungan_baru)."</b>";
echo "<br>";
echo "<br>";
//menganti pecahan

$nilai50000 = false;

foreach ($tabungan as $key => $nilai) {
    if ($nilai == 50000 && !$nilai50000) {
        $tabungan[$key] = 100000;
        $nilai50000 = true;
    } elseif ($nilai == 50000) {
        unset($tabungan[$key]);
        break;
    }
}
$tabungan = array_values($tabungan);
echo"saya ingin mengganti pecahan <b>50000</b> menjadi pecahan <b>100000</b>,maka uang yang berasa di tabungan menjadi <b>" .implode(",",$tabungan)."</b>";
echo "<br>";
echo "<br>";
//ditambakan
$tabungan_new = $tabungan;
array_push($tabungan_new,20000);
echo "hari ini aku menabung sebebsar <b>20000</b>,maka kini uang yang berada di tabungan saya adalah <b>" .implode(",",$tabungan_new)."</b>";
echo "<br>";
echo "<br>";
//diurutkan
asort($tabungan_new);
echo "jika di urutkan dari terkecil maka uang yang berada di ta adalah <b> " . implode(",",$tabungan_new)."</b>";
echo "<br>";
echo "<br>";
//dijumlahkan
$total = array_sum($tabungan_new);
echo "total tabungan saya adalah <b> $total</b>";
echo "<br>";


