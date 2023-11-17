<?php
//membuat array
$tabungan = array(10000 , 50000 , 10000 , 5000 
                 ,20000 , 5000 , 50000 , 20000);

//menampilkan isi array
echo "Uang tabungan yang saya miliki " . implode(", ",$tabungan) . "<br>";

//menjumlahkan isi array
echo "Jumlah tabungan: " . array_sum($tabungan) ."<br>" ;

//pecahan uang
echo "Dengan uang pecahan:" . implode(", " ,array_unique($tabungan)) . "<br>" ;

//mencari nilai min 
echo "Pecahan uang terkecil: " . min($tabungan). "<br>" ;

//mencari nilai max
echo "Pecahan uang terbesar: ". max($tabungan). "<br>" ;

// Mengurutkan array dari terkecil

$terkecil = $tabungan;
asort($terkecil);
echo "Jika diurutkan dari yang terkecil maka uang yang berada di tabungan adalah ".implode(", " ,$terkecil). "<br>" ;

//mengurutkan array dari terbesar
$terbesar = $tabungan;
arsort($terbesar);
echo "jika diurutkan dari yang terbesar maka uang yang berada di tabungan adalah ".implode(", ", $terbesar). "<br>" ;


echo "Saya ingin mengganti pecahan 50000 menjadi 100000, maka uang yang berada di tabungan menjadi ";
array_splice($tabungan, 1, 1, 100000);
$tabungan = array_diff($tabungan, [50000]);
foreach ($tabungan as $jumlah => $isi) {
    echo $isi;
    if ($jumlah < count($tabungan) - 1) {
        echo ", ";
    }
}

array_push($tabungan, 20000);
echo "<br>Menambahkan uang tabungan sebesar 20000, maka uang tabungan saya adalah: " . implode(', ' , $tabungan) ;
asort($tabungan);
echo "<br>Jika diurutkan dari yang terkecil maka uang yang berada di tabungan adalah ".implode(", " ,$tabungan). "<br>" ;
echo "Jumlah tabungan sekarang: " . array_sum($tabungan) ."<br>" ;
?>