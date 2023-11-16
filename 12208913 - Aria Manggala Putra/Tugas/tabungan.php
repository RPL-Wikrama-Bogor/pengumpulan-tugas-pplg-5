<?php
$tabungan_awal = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];
$teks = implode(" ,",$tabungan_awal);
echo "Uang yang terdapat ditabungan saya adalah <b>$teks</b>";
echo "<br>";
echo "Jumlah tabungan saya adalah ". array_sum($tabungan_awal);
echo "<br>";
$pecahan = array_unique($tabungan_awal);
$pecahan_implode = implode(" , ", $pecahan);
echo "Didalam tabungan saya terdapat uang pecahan ". "<b>$pecahan_implode</b>";
echo  "<br> Pecahan uang terkecil adalah ". min($tabungan_awal);
echo "<br>Pecahan uang terbesar adalah ". max($tabungan_awal);
$urutan_terkecil = $tabungan_awal;
asort($urutan_terkecil);
$urutan_terkecil_implode = implode(" , ", $urutan_terkecil);
echo "<br>Jika diurutkan dari yang terkecil maka uang yang berada ditabungan saya adalah " . $urutan_terkecil_implode;
$urutan_terbesar = $tabungan_awal;
arsort($urutan_terbesar);
$urutan_terbesar_implode = implode(" , ", $urutan_terbesar);
echo "<br> Jika diurutkan dari yang terbesar maka uang yang berada ditabungan saya adalah " . $urutan_terbesar_implode;


echo "<br> Saya ingin mengganti pecahan <b> 50000 </b> yang ada di tabungan menjadi <b> 100000 </b>,";
$tabungan_baru = [];
$gabung = false;

foreach ($tabungan_awal as $nilai) {
  if ($nilai == 50000 && !$gabung) {
    $tabungan_baru[] = 100000;
    $gabung = true;
  } elseif ($nilai == 50000 && $gabung) {
  } else {
    $tabungan_baru[] = $nilai;
  }
}
echo "maka kini uang yang terdapat di tabungan saya adalah <b> " . implode(', ', $tabungan_baru) . "</b>";
array_push($tabungan_awal, 20000);
$tabungan_tambahan = implode(" , ", $tabungan_awal);
echo "<br> Hari ini saya ingin menabung sebesar <b>20000</b>, maka kini uang yang berada ditabungan saya adalah " . $tabungan_tambahan;
asort($tabungan_awal);
$urutan_terkecil_implode_baru = implode(" , ", $tabungan_awal);
echo "<br>Jika diurutkan dari yang terkecil maka uang yang berada ditabungan saya adalah " . $urutan_terkecil_implode_baru;
echo "<br>Maka jumlah tabungan saya adalah " . array_sum($tabungan_awal);