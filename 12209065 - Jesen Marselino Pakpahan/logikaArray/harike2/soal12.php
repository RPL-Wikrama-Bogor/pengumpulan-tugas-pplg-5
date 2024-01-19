<?php
$berat = 44;
$tinggi = 148/100;
$tb = $tinggi*$tinggi;
$imt = $berat/$tb;

if($imt<=18.5){
    echo "berat badan kurang";
}elseif($imt > 18.5 && $imt <= 22.9){
    echo "normal";
}elseif($imt > 22.9 && $imt <= 24.9){
    echo "berat badan lebih";
}elseif($imt>=25){
    echo "obesitas";
}
?>