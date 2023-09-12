<?php 
    $tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];
    $kalimat = implode(", ", $tabungan);
    echo "uang yang terdapat pada tabunga saya ada : ".$kalimat;
    echo "<br>";
    $pecahan_unik = array_unique($tabungan);
    $pecahan_unik_implode = implode(", ", $pecahan_unik);
    echo "Pecahan yang terdapat di tabungan saya adalah : " . $pecahan_unik_implode;
    echo "<br>";
    echo "Jumlah Tabungan saia : " .array_sum($tabungan);
    echo "<br>";
    echo "Uang Tabungan paling kecil saya : " .min($tabungan);
    echo "<br>";
    echo "Uang Tabungan paling besar saya : " . max($tabungan);
    echo "<br>";
    asort($tabungan);
    $urutanTerkecil = implode(", ", $tabungan);
    echo "Pecahan uang terkecil adalah " . $urutanTerkecil;
    echo "<br>";
    arsort($tabungan);
    $urutanTerbesar = implode(", ", $tabungan);
    echo "Pecahan uang terkecil adalah " . $urutanTerbesar;
    echo "<br>";
    array_splice($tabungan,0,2, 100000);
    $implodeSplice = implode(', ', $tabungan);
    echo "saya menganti nilai 50000 dengan 100000";
    echo "<br>";
    asort($tabungan);
    $urutanTerkecil = implode(", ", $tabungan);
    echo "Pecahan uang terkecil adalah : " . $urutanTerkecil;
    echo "<br>";
    array_push($tabungan, 20000);
    $tambahTabungan = implode(", ", $tabungan);
    echo "Hari ini saya menabung 20000 maka tabungan saya menjadi : ". $tambahTabungan;
    echo "<br>";
    echo "makanya jumlah tabungan saya sekarang : ";
    echo array_sum($tabungan);

    
?>