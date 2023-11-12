<?php
$tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];


echo "uang yang terdapat pada tabungan saya adalah "."<b>" .implode(' ', $tabungan); echo"<br>" ."</b>";

$total = array_sum($tabungan);
echo "jumlah tabungan saya adalah " . "<b>".$total; echo"<br>" ."</b>";

$unique = array_unique($tabungan);
echo "di dalam tabungan saya terdapat pecahan"."<b>" .implode(",",$unique); echo"<br>" ."</b>";

$terkecil = min($tabungan);
echo "pecahan dari yang terkecil dalam tabungan saya adalah"."<b>" .$terkecil; echo"<br>" ."</b>";

$terbesar = max($tabungan);
echo "pecahan dari yang terbesar dalam tabungan saya adalah"."<b>" .$terbesar; echo"<br>" ."</b>";

sort($tabungan);
echo "jika di urutkan dari yang terkecil maka uang yang berada di tabungan adalah" ."<b>";
foreach ($tabungan as $uhuy){
echo $uhuy . " " ."</b>";

}
echo "<br>";

rsort($tabungan);
echo "jika di urutkan dari yang terbesar maka uang yang berada di tabungan adalah" ."<b>";
foreach ($tabungan as $uhuy){
echo $uhuy . " " ."</b>";
}

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

