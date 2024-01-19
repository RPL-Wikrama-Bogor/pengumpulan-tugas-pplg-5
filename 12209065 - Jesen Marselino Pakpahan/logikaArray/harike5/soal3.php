<?php
$a = 9;
function satu($a){
    for($i=1;$i <= 12;$i++){
        $hasil =$a*4+$i*3;
        echo "hasil dari ". $a. "*4"."+".$i."*3=" .$hasil."<br>";
    }
}
satu($a);
?>