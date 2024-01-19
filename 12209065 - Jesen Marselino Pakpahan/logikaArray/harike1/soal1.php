<?php
$andi = 16;
$dani = $andi;
$beni = $andi + 3;
$eko = $beni - 5;

$usia =array($andi,$dani,$beni,$eko);

foreach ($usia as $key)

if ($key%4==0){
    echo $key, " ini tahun kabisat","<br>";
} elseif ($key%4!=0){
    echo $key, " ini bukan tahun kabisat","<br>";
}
?>