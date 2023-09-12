<?php
$tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];



echo "uang yang terdapat di tabungan saya adalah ".implode(' ', $tabungan);  echo "<br>";   echo "<br>";   


$total = array_sum($tabungan);
echo "  Jumlah tabungan saya adalah ". $total;  echo "<br>";   echo "<br>";   


$unik = array_unique($tabungan);
echo "Di dalam tabungan saya terdapat uang pecahan " . implode(", ", $unik);    echo "<br>"; echo "<br>";   

$terkecil = min($tabungan);
echo "Pecahan terkecil dalam tabungan saya adalah: " . $terkecil; echo "<br>"; echo "<br>";   

$terbesar = max($tabungan);
echo "Pecahan terbesar dalam tabungan saya adalah: " . $terbesar; echo "<br>"; echo "<br>";   

sort($tabungan);
echo "jika diurutkan dari yang terkecil maka uang yang berada di tabungan adalah ";
foreach ($tabungan as $nilai) {
    echo $nilai . " ";
}
echo "<br>"; echo "<br>";   

rsort($tabungan);
echo "jika diurutkan dari yang terbesar maka uang yang berada di tabungan adalah ";
foreach ($tabungan as $simon) {
    echo $simon . " ";
}
echo "<br>"; echo "<br>";   

$tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];
$found = false;
foreach ($tabungan as $key => $nilai) {
    if ($nilai === 50000 && !$found) {
        $tabungan[$key] = 100000;
        $found = true;
    } elseif ($nilai === 50000 && $found) {
        unset($tabungan[$key]);
    }
}


$tabungan = array_values($tabungan);
echo "saya ingin mengganti pecahan 50000 yang ada ditabungan menjadi 100000, maka uang yang berada di tabungan menjadi  ";
foreach ($tabungan as $nilai) {
    echo $nilai . " ";
}

 

echo"<br>"; echo "<br>";   

array_push($tabungan, 20000);
echo " Hari ini saya menabung 20000, maka kini uang yang berada di tabungan saya adalah " . implode(", ", $tabungan); echo"<br>"; echo "<br>";   

asort($tabungan);
echo "Jika diurutkan dari yang terkecil kini tabungan saya adalah " . implode(", ", $tabungan); echo"<br>"; echo "<br>";   

echo "Maka jumlah tabungan saya saat ini adalah " . array_sum($tabungan);