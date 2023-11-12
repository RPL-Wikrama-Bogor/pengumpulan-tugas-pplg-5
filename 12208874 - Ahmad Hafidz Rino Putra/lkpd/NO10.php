<?php 

$pabp = 70;
$mtk = 82;
$dpk = 77;

$rt = ($pabp + $mtk + $dpk) / 3;
echo $rt.'<br>';
 if ($rt <= 100 && $rt >= 80) {
    echo "A";
 } elseif ($rt < 80 && $rt >= 75) {
    echo "B";
 } elseif ($rt < 75 && $rt >= 65) {
    echo "C";
 } elseif ($rt < 65 && $rt >= 45) {
    echo "D";
 } elseif ($rt < 45 && $rt >= 0 ) {
    echo "E";
 } else {
    "K";
 }