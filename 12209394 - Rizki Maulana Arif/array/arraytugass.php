<?php
$tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];

// no 1
echo "Uang yang terdapat di tabungan saya adalah <b> " . implode(", ", $tabungan) . "<br>". "<br>";


// no 2
echo "Jumlah tabungan saya adalah <b> " . array_sum($tabungan) . "<br>". "<br>";


// no 3
$pecahan_unik = array_unique($tabungan); // menghapus duplikat
echo "Pecahan yang terdapat di tabungan saya adalah <b> " . $pecahan_unik_implode = implode(", ", $pecahan_unik) . "<br>". "<br>";



echo "Pecahan uang terkecil adalah <b> " . min($tabungan) . "<br>". "<br>";

echo "Pecahan uang terbesar adalah <b> " . max($tabungan) . "<br>". "<br>";

$tabunganberurutan =  $tabungan;
asort($tabunganberurutan);
echo "Jika diurutkan dari yang terkecil maka uang yang berada di tabungan adalah <b> " . implode(", ", $tabunganberurutan) . "<br>". "<br>" ;

arsort($tabungan);
echo "Jika diurutkan dari yang terbesar maka uang yang berada di tabungan adalah <b> " . implode(", ", $tabunganberurutan) . "<br>". "<br>";
echo "saya ingin mengganti pecahan <b> 50000 <br> yang ada di tabungan menjadi <br> 100000 <br>";

array_splice($tabungan, 0, 2, 100000);

shuffle($tabungan);
echo "maka kini uang yang terdapat di tabungan saya adalah <b> " . implode(', ', $tabungan ) . "<br>". "<br>";


array_push($tabungan, 20000);
echo "Uang yang terdapat di tabungan saya adalah <b> " . implode(", ", $tabungan) . "<br>". "<br>";

asort($tabungan);
echo "Jika diurutkan dari yang terkecil kini tabungan saya adalah <b> " . implode(", ", $tabungan) . "<br>". "<br>";

echo "Maka jumlah tabungan saya saat ini adalah <b> " . array_sum($tabungan) . "<br>". "<br>";

