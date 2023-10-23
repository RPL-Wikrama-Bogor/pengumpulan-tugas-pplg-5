<?php
// memanggil isi array
$tabungan = array('10000 ' , '50000 ', '10000 ', '5000 ', '20000 ', '5000 ', '50000 ', '20000');
echo "Uang yang terdapat di tabungan Saya adalah ";
$tampil = implode(", ",$tabungan);
echo $tampil;
echo "<br>";

//menjumlahkan isi array
$jumlah_nilai = array_sum($tabungan);
echo "Jumlah tabungan saya adalah ";
echo $jumlah_nilai;

//memanggil perwakilan array
$uangArr = array_unique($tabungan);
$uangs = array_values($uangArr);
echo "<br> Didalam tabungan saya terdapat uang pecahan ";
foreach ($uangs as $money) {
    echo $money . ", ";
};
echo "<br>";

//memanggil pecahan terkecil
echo "Pecahan uang terkecil adalah ";
echo min($tabungan);
echo "<br>";

//memanggil pecahan terbesar
echo "Pecahan uang terbesar adalah ";
echo max($tabungan);
echo "<br>";

//mengurutkan dari yang terkecil
sort($tabungan);
echo "Uang saya jika diurutkan dari yang terkecil ";
foreach ($tabungan as $nilai) {
    echo $nilai . " ";
}
echo "<br>";

//mengurutkan dari yang terbesar
rsort($tabungan);
echo "Uang saya jika diurutkan dari yang terbesar ";
foreach ($tabungan as $nilai) {
    echo $nilai . " ";
}
echo "<br>";    

//mengganti array   
echo "<br> Saya igin mengganti pecahan 50000 menjadi 100000, maka uang yang berada di tabungan menjadi ";
$index2 = array_search(50000, $tabungan, true);
array_splice($tabungan, $index2, 1, "100000");
$index = array_search(50000, $tabungan);
unset($tabungan[$index]);

echo $kalimat = implode(", ",$tabungan);
echo "<br>";

//menambahkan array
array_push ($tabungan, 20000);

echo "Hari ini saya menabung sebesar 20000, maka kini uang yang berada ditabungan saya adalah : ";
$tambah = implode(", ",$tabungan);
echo $tambah;
echo "<br />";

//mengurutkan dari yang terkecil (II)
sort($tabungan);
echo "Uang saya jika diurutkan dari yang terkecil ";
foreach ($tabungan as $nilai) {
    echo $nilai . " ";
}
echo "<br>";

//menjumlahkan 
$jumlah_nilai = array_sum($tabungan);
echo "Jumlah tabungan saya adalah ";
echo $jumlah_nilai;




