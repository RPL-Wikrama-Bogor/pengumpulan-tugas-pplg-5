<?php
function hitungGaji($nama, $gaji_pokok) {
    $tunj = 0.2 * $gaji_pokok;
    
    $pjk = 0.15 * ($gaji_pokok + $tunj);
    
    $gaji_bersih = $gaji_pokok + $tunj - $pjk;
    
    echo "Nama Karyawan: " . $nama . "<br>";
    echo "Tunjangan: " . $tunj . "<br>";
    echo "Pajak: " . $pjk . "<br>";
    echo "Gaji Bersih: " . $gaji_bersih . "<br>";
}
$nama = $_POST["nama"];
$gaji_pokok =   ($_POST["gaji_pokok"]);

hitungGaji($nama, $gaji_pokok);
?>

