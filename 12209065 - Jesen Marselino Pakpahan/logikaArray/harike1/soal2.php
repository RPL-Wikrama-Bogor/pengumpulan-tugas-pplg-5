<?php

$totalPeserta = 121;

$webAppCode = " 01w";
$androidCode = "02A";
$gameCode = "03g";


$mataLombaEko = "web app";
$kategoriEko = "";


if ($mataLombaEko == "web app") {
    $kategoriEko = " P "; 
} elseif ($mataLombaEko == "android" || $mataLombaEko == "game") {
    $kategoriEko = "A"; 
}

$nomorPesertaEko = $totalPeserta + 1;
$nomorPesertaEko .= $webAppCode;
$nomorPesertaEko .= $kategoriEko;
$nomorPesertaEko .= date('y');

echo "Nomor Peserta Eko: $nomorPesertaEko";

?>