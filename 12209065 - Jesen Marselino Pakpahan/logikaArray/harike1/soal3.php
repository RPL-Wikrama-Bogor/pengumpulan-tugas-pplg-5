<?php
$p = 13;
$l = 9;

$rumah = $p*$l;

if($rumah <=90){
    echo "tipe 36";
} elseif($rumah > 90 && $rumah <= 96){
    echo "tipe 45";
} elseif($rumah > 96 && $rumah <= 120){
    echo "tipe 54";
} elseif($rumah > 120 && $rumah <= 150){
    echo "tipe 60";
} elseif($rumah >=150){
    echo "tipe 70";
}
?>