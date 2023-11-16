<?php
    $tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];

    echo 'Uang yang terdapat di tabungan saya adalah ' . implode(', ', $tabungan) ;
    echo '<br>';

    echo 'Jumlah tabungan saya adalah ' . array_sum($tabungan);
    echo '<br>';

    echo 'Didalam tabungan saya terdapat pecahan ' . implode(', ', array_unique($tabungan));
    echo '<br>';

    echo 'Pecahan uang terkecil adalah ' . min($tabungan);
    echo '<br>';

    echo 'Pecahan uang terbesar adalah ' . max($tabungan);
    echo '<br>';

    asort($tabungan);
    echo 'Jika diurutkan dari yang terkecil maka uang yang berada di tabungan adalah ' . implode(', ', $tabungan);
    echo '<br>';

    arsort($tabungan);
    echo 'Jika diurutkan dari yang terbesar maka uang yang berada di tabungan adalah ' . implode(', ', $tabungan);
    echo '<br>';

    $tabungan = [10000, 100000, 10000, 5000, 20000, 5000, 20000];
    echo 'Saya ingin mengganti pecahan 50000 ke 100000 maka ' . implode(', ', $tabungan);
    echo '<br>';

    array_push($tabungan, 20000);
    echo 'Saya menabung 20000 maka tabungan saya ' . implode(', ', $tabungan);
    echo '<br>';

    asort($tabungan);
    echo 'Jika diurutkan dari yang terkecil maka uang yang berada di tabungan adalah ' . implode(', ', $tabungan);
    echo '<br>';

    echo 'Maka jumlah tabungan saya adalah ' . array_sum($tabungan);
    echo '<br>';
?>