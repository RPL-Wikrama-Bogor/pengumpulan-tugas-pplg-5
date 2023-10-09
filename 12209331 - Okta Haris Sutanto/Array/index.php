<?php
// buat array

// no 1
$tabungan = array(10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000);
$kalimat = implode(", ",$tabungan);

// no 2
echo "uang yang terdapat di tabungan saya:" . $kalimat . "<br>~~~~~~~~~~~~~~~~~<br>";

// no 3
$sum = $tabungan;
echo "Jumlah tabungan saya adalah: " . array_sum($sum) .  "<br>~~~~~~~~~~~~~~~~~<br>";


// no 4
$unique_tabungan = array_unique($tabungan);
echo "Didalam tabungan saya terdapat uang pecahan: " . $unique_tabungan = implode(", ",$unique_tabungan) . "<br>~~~~~~~~~~~~~~~~~<br>";

// no 5
$max 	= max($tabungan);
$min 	= min($tabungan);
echo "pecahan uang terkecil adalah: " . $min .  "<br>~~~~~~~~~~~~~~~~~<br>";
echo "pecahan uang terbesar adalah: " . $max .  "<br>~~~~~~~~~~~~~~~~~<br>";

// no 6
$terkecil_asort = $tabungan;
asort($terkecil_asort);
echo "jika diurutkan dari yang terkecil maka uang berada ditabungan adalah: " . implode(", ", $terkecil_asort) . "<br>~~~~~~~~~~~~~~~~~<br>";


// no 7
$terbesar_arsort = $tabungan;
arsort($terbesar_arsort);
echo "jika diurutkan dari yang terbesar maka uang berada ditabungan adalah: " . implode(", ", $terbesar_arsort) . "<br>~~~~~~~~~~~~~~~~~<br>";

// no 8
echo "saya ingin mengganti pecahan  50000 </b> yang ada di tabungan menjadi  100000 </b> <br>";
// array_splice($tabungan, 0, 2, 100000);
// shuffle($tabungan);

// echo " <br> -------------------- <br>";

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

echo "maka kini uang yang terdapat di tabungan saya adalah  " . implode(', ', $tabungan_baru) . "</b>";
echo "<br>~~~~~~~~~~~~~~~~~<br>";

// no 9
// menambahkan isi pada indeks terakhir
array_push ($tabungan, 20000);
echo "Hari ini saya menabung 20000, maka kini uang yang berada ditabungan saya adalah: " . implode(", ", $tabungan) . "<br>~~~~~~~~~~~~~~~~~<br>";

// no 10
// no 11
$asort = $tabungan_baru;
asort($asort);
echo "jika diurutkan dari yang terkecil maka uang berada ditabungan adalah: " . implode(", ", $asort) . "<br>~~~~~~~~~~~~~~~~~<br>";
$arsort = $tabungan_baru;

$sum_baru = $tabungan;
echo "Jumlah tabungan saya adalah: " . array_sum($sum_baru) .  "<br>~~~~~~~~~~~~~~~~~<br>";