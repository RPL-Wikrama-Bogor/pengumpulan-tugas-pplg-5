<?php
$bil1 = [1,2,3];
$bil2 = [1,2,3,4,5,6,7,8,9,10];

foreach($bil1 as $item1){
    foreach($bil2 as $item2){
        echo $item1."*". $item2." =".$item1*$item2."<br>";
    }
}
?>