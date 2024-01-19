<?php
$harga=154000;
$diskon=0.07;

if($harga >= 100000){
    $hasil=$harga*$diskon;
    $akhir=$harga-$hasil;
    echo 'yang harus dibayar oleh andi  : '.number_format($akhir,0,'','.').'<br>';

}else{
    echo $harga;
}