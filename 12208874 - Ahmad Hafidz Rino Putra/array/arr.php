<?php
$tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];
echo "Uang yang terdapat di tabungan saya adalah " . implode(", " ,$tabungan);
echo "<br> Jumlah tabungan saya adalah " . array_sum($tabungan);
echo "<br> Didalam tabungan saya terdapat uang pecahan ". implode(", ",array_unique($tabungan));
echo " <br>pecahan uang terkecil adalah " . min($tabungan);
echo " <br>pecahan uang terbesar adalah " . max($tabungan);
$tabunganK = $tabungan;
asort($tabunganK);
echo " <br> Jika diurutkan dari yang terkecil maka uang yang berada di tabungan adalah ".implode(", " ,$tabunganK);
$tabunganB = $tabungan;
arsort($tabunganB);
echo " <br> jika diurutkan dari yang terbesar maka uang yang berada di tabungan adalah ".implode(", ", $tabunganB);
echo " <br> Saya ingin mengganti pecahan 50000 menjadi 100000, maka uang yang berada di tabungan menjadi ";
array_splice($tabungan, 1, 1, 100000);
$tabungan = array_diff($tabungan, [50000]);
foreach ($tabungan as $jumlah => $isi) {
    echo $isi;
    if ($jumlah < count($tabungan) - 1) {
        echo ", ";
    }
}
$tabungan[] = 20000;

echo " <br> Hari ini saya menabung sebesar 20000, maka kini uang yang berada di tabungan saya adalah " . implode(", ", $tabungan);
$tabunganK2 = $tabungan;
asort($tabunganK2);
echo "<br> Jika diurutkan dari yang terkecil kini tabungan saya adalah ".implode(", ",$tabunganK2);
echo "<br> Maka jumlah tabungan saya adalah ". array_sum($tabungan);