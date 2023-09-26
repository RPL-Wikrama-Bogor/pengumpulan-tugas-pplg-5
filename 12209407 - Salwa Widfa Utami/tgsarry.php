<?php
    $tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];

    echo "Uang yang terdapat di tabungan saya adalah ";
    foreach($tabungan as $isi ){
        echo $isi . ", ";
    }

    echo '<br> Jumlah tabungan saya adalah ' .  array_sum($tabungan);

    $pecahan_unik = array_unique($tabungan);
    echo "<br> Pecahan yang terdapat di tabungan saya adalah " . $pecahan_unik_implode = implode(", ", $pecahan_unik);

    $max = max($tabungan);
    $min = min($tabungan);
    echo '<br> Pecahan uang terkecil adalah ' . $min;
    echo "<br> Pecahan nilai terbesar adalah " . $max ;

    echo "<br> Jika diurutkan dari yang terkecil maka uang yang berada di tabungan adalah ";
    $terkecil = $tabungan;
    asort($terkecil);
    foreach($terkecil as $isi ){
        echo $isi . ", ";
    }
    echo "<br> Jika diurutkan dari yang terbesar maka uang yang berada di tabungan adalah ";
    $terbesar = $tabungan;
    arsort($terbesar);
    foreach($terbesar as $isi ){
        echo $isi . ", ";
    }

    echo "<br> Saya ingin mengganti pecahan 50000 menjadi 100000, maka uang yang berada di tabungan menjadi ";
    $ganti = $tabungan;
    array_splice($ganti, 0, 2, 100000,);
    foreach ($ganti as $jumlah => $isi) {
        echo $isi . ", " ;
    }

    echo "<br> Hari ini saya menabung sebesar 20000, maka kini uang yang berada di tabungan saya adalah ";
    array_push ($tabungan, 20000);
    foreach($tabungan as $isi ){
        echo $isi . ", ";
    }

    echo "<br> Jika diurutkan dari yang terbesar maka uang yang berada di tabungan adalah ";
    asort($tabungan);
    foreach($tabungan as $isi ){
        echo $isi . ", ";
    }

    echo '<br> Jumlah tabungan saya adalah ' .  array_sum($tabungan);
