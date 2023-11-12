<?php
$tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];

//no 1
echo "Uang yang terdapat di tabungan saya adalah <b> " . implode (", ", $tabungan) . "</b>";
echo " <br>";

//no 2
echo "Jumlah tabungan saya adalah <b> " . array_sum($tabungan) . "</b>";
echo " <br>";

//no 3
$pecahan_unik = array_unique($tabungan); // menghapus duplikat
echo "Pecahan yang terdapat di tabungan saya adalah <b> " . $pecahan_unik_implode = implode(", ", $pecahan_unik) . "</b>";
echo " <br>";

//no 4
echo "Pecahan uang terkecil adalah <b> " . min($tabungan) . "</b>";
echo " <br>";

//no 5
echo "Pecahan uang terbesar adalah <b> " t. max($tabungan) . "</b>";
echo " <br>";

//no 6
$tabungan_baru = $tabungan;
asort($tabungan_baru);
echo "Jika diurutkan dari yang terkecil maka uang yang berada di tabungan adalah <b> " . implode(", ", $tabungan_baru) . "</b>";
echo " <br>";

//no 7
arsort($tabungan_baru);
echo "Jika diurutkan dari yang terbesar maka uang yang berada di tabungan adalah <b> " . implode(", ", $tabungan_baru) . "</b>";
echo " <br>";

// no 8
echo "saya ingin mengganti pecahan <b> 50000 </b> yang ada di tabungan menjadi <b> 100000 </b> <br>";
$tabungan_baru = [];
$gabung = false;

foreach ($tabungan as $nilai) {
  if ($nilai == 50000 && !$gabung) {
    $tabungan_baru[] = 100000;
    $gabung = true;
  } elseif ($nilai == 50000 && $gabung) {
  } else {
    $tabungan_baru[] = $nilai;
  }
}

echo "maka kini uang yang terdapat di tabungan saya adalah <b> " . implode(', ', $tabungan_baru) . "</b>";
echo " <br>";

//no 9 
array_push($tabungan_baru, 20000);
echo "Uang yang terdapat di tabungan saya adalah <b> " . implode(", ", $tabungan_baru) . "</b>";
echo " <br>";

//no 10 
asort($tabungan_baru);
echo "Jika diurutkan dari yang terkecil kini tabungan saya adalah <b> " . implode(", ", $tabungan_baru) . "</b>";
echo " <br>";

//no 11
echo "Maka jumlah tabungan saya saat ini adalah <b> " . array_sum($tabungan_baru) . "</b>";
echo " <br>";
