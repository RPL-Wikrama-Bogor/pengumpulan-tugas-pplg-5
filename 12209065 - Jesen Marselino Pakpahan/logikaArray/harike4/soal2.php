<?php
$bilangan = [75,77,87,70,90,81,69,87,66];

foreach($bilangan as $key){
    if($key >= 75){
        echo $key ," kompeten","<br>";
    }else{
        echo $key ," tidak kompeten","<br>";
    }
}
?>