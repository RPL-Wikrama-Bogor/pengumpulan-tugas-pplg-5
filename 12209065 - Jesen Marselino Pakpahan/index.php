<?php
    $tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];
    $tabungan1 = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];
    
    $teks = implode(", ", $tabungan);
    $jumlah =array_sum($tabungan);
    $sama =array_unique($tabungan);
    $min =min($tabungan);
    $max =max($tabungan);
    sort($tabungan);
    $terbesar =$tabungan;
    rsort($tabungan); 
    $terkecil=$tabungan;
    array_splice($tabungan1,1,1,100000);
    array_splice($tabungan1,6,1);
    $ganti = $tabungan1;
    array_unshift($tabungan1,20000);
    sort($tabungan);
    $skrng=$tabungan1;
    
    

    echo "Uang yang terdapat di tabungan saya adalah ".$teks."<br>";
    echo "Jumlah tabungan saya adalah ".$jumlah."<br>";
    echo "Didalam tabungan saya terdapat uang pecahan ".implode(" ",$sama)."<br>";
    echo "Pecahan uang terkceil adalah ".$min."<br>";
    echo "Pecahan uang terbesar adalah ",$max."<br>";
    echo "Terkecil ke terbesar".implode(" ",$terkecil) . "<br>";
    echo "Terbesar ke terkecil".implode(" ",$terbesar) . "<br>";
    echo "Mengganti <b>50000</b> menjadi <b>100000</b>: ". implode(",",$ganti)."<br>";
    echo "Hari ini saya menabung sebesar<b>20000</b>maka kini uang tabungan saya: ". implode(",",$tabungan1)."<br>";  
    echo "tabungan sekarang:  ". implode(",",$tabungan1)."<br>";
    echo "jumlah tabungan sekarang adalah: ".array_sum($tabungan1);
    
    
    

    
    
    

    

?>