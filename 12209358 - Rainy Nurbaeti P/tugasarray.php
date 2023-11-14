<?php
$tabungan = [10000,50000,10000,5000,20000,5000,50000,20000];
echo"uang yang terdapat di tabungan saya adalah";

foreach($tabungan as $isi){
    echo  $isi.", ";
}
echo"<br>";

echo'jumlah tabungan saya adalah'. array_sum($tabungan);
echo'<br>';
$array = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];
echo 'didalam tabungan saya terdapat pecahan';
$jawaban_no_3= array_unique($array);
echo implode(', ', $jawaban_no_3);
echo '<br>';
echo'pecahan uang terkecil adalah'. $min = min($tabungan);
echo'<br>';
echo'pecahan uang terbesar adalah'. $max = max($tabungan);
echo'<br>';
echo'jika di ururtkan dari yang ter kecil di dalam tabungan adalah';
$terkecil=$tabungan;
asort($tabungan);
foreach($tabungan as $isi){
    echo  $isi.", ";
}
echo'<br>';

echo'jika di ururtkan dari yang ter besar di dalam tabungan adalah';
$terbesar=$tabungan;
arsort($tabungan);
foreach($tabungan as $isi){
    echo  $isi.", ";
}
echo"<br>";
echo "saya igin mengganti pecahan 50000 menjadi 100000, maka uang yang berada di tabungan menjadi ";
    array_splice($tabungan, 0, 2, 100000,);
    foreach ($tabungan as $jumlah => $isi) {
        echo $isi . ", ";
    }
echo "<br> Hari ini saya menabung sebesar 20000, maka kini uang yang berada di tabungan saya adalah ";
// $tabung=$tabungan;
    array_push ($tabungan, 20000);
    foreach($tabungan as $isi ){
        echo $isi . ", ";
    }
    echo "<br> Jika diurutkan dari yang kecil maka uang yang berada di tabungan adalah ";
    asort($tabungan);
    foreach($tabungan as $isi ){
        echo $isi . ", ";
    }

    echo '<br> Jumlah tabungan saya adalah ' .  array_sum($tabungan);





?>