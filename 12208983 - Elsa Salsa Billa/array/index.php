<?php

$tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];

// baris 1 (menampilkan)
echo "Uang yang terdapat ditabungan Saya adalah : ";
$tampil = implode(", ",$tabungan);
echo $tampil . "<br>";

// baris 2 (menjumlahkan)

echo "Jumlah tabungan Saya adalah : " . array_sum($tabungan);
echo "<br>";

//baris 3 (mencari bilangan pecahan)
$tabungArr = array_unique($tabungan);
$tabungans = array_values($tabungArr);
echo "Didalam tabungan saya terdapat uang pecahan ";
foreach ($tabungans as $tabung) {
    echo $tabung . ", ";
};
echo "<br>";

//baris 4 dan 5 (terbesar dan terkecil)

$min 	= min($tabungan);
$max 	= max($tabungan);

echo "Bilangan Terkecil adalah : ". $min;
echo "<br />";
echo "Bilangan Terbesar adalah : " . $max;
echo "<br />";

//baris 6 
echo "Bilangan jika diurutkan terkecil ke terbesar adalah : ";
asort($tabungan);

foreach($tabungan as $terkecil) {
    echo $terkecil . ", ";
}
echo "<br>";

//baris 7
echo "Bilangan jika diurutkan terbesar ke terkecil adalah : ";
arsort($tabungan);

foreach($tabungan as $terbesar) {
    echo $terbesar . ", ";
}
echo "<br>";

//baris 8 (mengganti isi indeks)
echo "Saya igin mengganti pecahan 50000 menjadi 100000, maka uang yang berada di tabungan menjadi ";
    $index2 = array_search(50000, $tabungan, true);
    array_splice($tabungan, $index2, 1, "100000");
    $index = array_search(50000, $tabungan);
    unset($tabungan[$index]);

    echo $kalimat = implode(", ",$tabungan);
    echo "<br>";


//baris 9 (menambah indeks)
array_push ($tabungan, 20000);

echo "Hari ini saya menabung sebesar 20000, maka kini uang yang berada ditabungan saya adalah : ";
$tambah = implode(", ",$tabungan);
echo $tambah;
echo "<br />";

//baris 10
echo "Bilangan jika diurutkan dari yang terkecil, maka kini tabungan Saya adalah : ";
asort($tabungan);

foreach($tabungan as $terkecil) {
    echo $terkecil . ", ";
}
echo "<br>";

//baris 11
echo "Maka jumlah tabungan Saya saat ini adalah : " . array_sum($tabungan);
echo "<br>";
