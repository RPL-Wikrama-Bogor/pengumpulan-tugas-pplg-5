<?php
 echo"<h1>giblar tamvan</h1>";
$tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];

// nomor 1
echo "1.Uang yang terdapat di tabungan saya adalah <b> " . implode(", ", $tabungan) . "</b>";
echo " <br> <br>";

// nomor 2
echo "2.Jumlah tabungan saya adalah <b> " . array_sum($tabungan) . "</b>";
echo " <br> <br>";

// nomor 3
$pecahan_unik = array_unique($tabungan); //biar gack duplikat
echo "3.Pecahan yang terdapat di tabungan saya adalah <b> " . $pecahan_unik_implode = implode(", ", $pecahan_unik) . "</b>";
echo " <br> <br>";

// nomor 4
echo "4.Pecahan uang terkecil adalah <b> " . min($tabungan) . "</b>";
echo " <br> <br>";

// nomor 5
echo "5.Pecahan uang terbesar adalah <b> " . max($tabungan) . "</b>";
echo " <br> <br>";

// nomor 6 
$tabungan_baru = $tabungan;
asort($tabungan_baru);
echo "6.Jika diurutkan dari yang terkecil maka uang yang berada di tabungan adalah <b> " . implode(", ", $tabungan_baru) . "</b>" ;
echo " <br> <br>";

//nomor 7
arsort($tabungan_baru);
echo "7.Jika diurutkan dari yang terbesar maka uang yang berada di tabungan adalah <b> " . implode(", ", $tabungan_baru) . "</b>";
echo " <br> <br>";

//nomor 8
echo "8. Saya ingin menggabungkan pecahan <b>50000</b> yang ada di tabungan menjadi <b>100000</b><br>";

$nilaiGocap = false;

foreach ($tabungan as $key => $nilai) {
    if ($nilai == 50000 && !$nilaiGocap) {
        $tabungan[$key] = 100000;
        $nilaiGocap = true;
    } elseif ($nilai == 50000) {
        unset($tabungan[$key]);
        break;
    }
}
$tabungan = array_values($tabungan);
echo"mengati".implode(",",$tabungan);
echo "<br>";
echo "<br>";



//nomor 9 
array_push($tabungan, 20000);
echo "9.saya hari ini menabung sebesar <b>20000</b> kini tabungan saya menjadi <b> " . implode(", ", $tabungan) . "</b>";
echo " <br> <br>";

//nomor 10 
asort($tabungan);
echo "10.Jika diurutkan dari yang terkecil kini tabungan saya adalah <b> " . implode(", ", $tabungan) . "</b>";
echo " <br> <br>";  

//nomor 11
echo "11.Maka jumlah tabungan saya saat ini adalah <b> " . array_sum($tabungan) . "</b>";
echo " <br> <br>";


























?>
