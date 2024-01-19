<?php

$waktu_kerja =8;

function hitungKerja($waktu_kerja){

$waktu_kerja1 = $waktu_kerja*60;
$waktu_sholat = 20;
$waktu_istirahat = 30;

$total_waktu_istirahat = $waktu_sholat + $waktu_istirahat;
$kerja = $waktu_kerja1 - $total_waktu_istirahat;

return ['kerja' => $kerja ,'waktuIstirahat' => $total_waktu_istirahat,];

}
$hasil = hitungKerja($waktu_kerja);
echo "Waktu Kerja Efektif: " . $hasil['kerja'] . " menit\n". "<br>";
echo "Total Waktu Istirahat: " . $hasil['waktuIstirahat'] . " menit\n";

?>