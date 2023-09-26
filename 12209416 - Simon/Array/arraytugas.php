<?php
echo "1. " ;
$tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];
echo "Uang yang terdapat di tabungan saya adalah ".implode(' ', $tabungan);  echo "<br>";   


echo "2. " ;
$total = array_sum($tabungan);
echo "Jumlah tabungan saya adalah ". $total;  echo "<br>";   


echo "3. " ;
$unik = array_unique($tabungan);
echo "Di dalam tabungan saya terdapat uang pecahan " . implode(", ", $unik); echo "<br>";


echo "4. " ;
$kecil= min($tabungan);
echo "Pecahan uang teckecil adalah " .$kecil; echo"<br>";


echo "5. " ;
$besar= max($tabungan);
echo "Pecahan uang terbesar adalah " .$besar; echo"<br>";


echo "6. " ;
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


echo "7. " ;
$tabungan = array_values($tabungan);
echo "saya ingin mengganti pecahan 50000 yang ada ditabungan menjadi 100000, maka uang yang berada di tabungan menjadi  ";
foreach ($tabungan as $nilai) {
    echo $nilai . " ";
}


echo "8. " ;
sort($tabungan);
echo "Dari angka yang terkecil ";
foreach ($tabungan as $nilai) {
    echo $nilai . " ";
} echo"<br>";   


echo "9. " ;
rsort($tabungan);
echo "Dari angka yang terbesar ";
foreach ($tabungan as $nilai) {
    echo $nilai . " ";
} echo"<br>";

echo "10. " ;
array_push($tabungan, 20000);
echo "Uang yang terdapat di tabungan saya adalah " . implode(", ", $tabungan); echo"<br>";

echo "11. " ;
asort($tabungan);
echo "Jika diurutkan dari yang terkecil kini tabungan saya adalah " . implode(", ", $tabungan); echo"<br>";

echo "12. " ;
echo "Maka jumlah tabungan saya saat ini adalah " . array_sum($tabungan); echo"<br>";
?>