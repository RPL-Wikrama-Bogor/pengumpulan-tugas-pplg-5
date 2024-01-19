<?php

$jam = 12;
$menit = 12;

if($jam >= 07 && $jam <= 11 ){
    if($menit <= 30){
        echo "waktunya kerja";
        }
        else{
            echo "waktunya healing dulu";
        }
        
        
}elseif($jam > 11 && $jam <= 12){
    if($menit <= 15){
        echo "waktunya healing dlu";
    }
    
}elseif($jam > 12 && $jam < 16){
    if($menit <= 60){
        echo "waktunya kerja lagi";
    }
    
}elseif($jam >= 16 or $jam <= 07){
    if($menit == 00){
        echo "waktunya bebas, yeayyyy ";
     }
}

?>