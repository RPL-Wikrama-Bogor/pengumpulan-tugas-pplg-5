<?php
$mtk = 83;
$binggris = 86;
$bindo = 87;
$usia = 25;
$rata_rata =($mtk+$binggris+$bindo)/3;

if($usia >= 16 && $usia <= 25 ){
    if($mtk >= 87 && $binggris >= 85 && $bindo >= 87){
      if($rata_rata>=85){
        echo "diterima";
    }else{
        echo "aaaaa kasian aaaaa";
    }  
    }else{
    echo "tidak sesuai";
}
}
?>