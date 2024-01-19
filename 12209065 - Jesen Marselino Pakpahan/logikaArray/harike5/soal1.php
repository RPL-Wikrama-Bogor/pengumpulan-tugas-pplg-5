<?php
$angka = [3,5,7,10];

function satu($angka){
    foreach($angka as $key){
    for($i=1;$i<=1000;$i++){
        
        if(1000%$key==0){
            echo "angka yang bisa dibagi 1000 adalah" .$key ."<br>";
            break;
        }
        
        }
    }
}
satu($angka);
?>