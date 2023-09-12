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

    $tabungan1 = $tabungan;
    asort($tabungan1);
    $urutanTerkecil = implode(", ", $tabungan1);
    echo "Pecahan uang terkecil adalah " . $urutanTerkecil;
    echo "<br>";

    $tabungan2 = $tabungan;
    arsort($tabungan2);
    $urutanTerbesar = implode(", ", $tabungan2);
    echo "Pecahan uang terkecil adalah " . $urutanTerbesar;
    echo "<br>";
    $tabungan_baru = [];
    $gabung = false;

    foreach ($tabungan as $nilai) {
        if ($nilai == 50000 && !$gabung) {
            $tabungan_baru[] = 100000;
            $gabung = true;
        } elseif ($nilai == 50000 && $gabung) {
        
        } else {
            $tabungan_baru[] = $nilai;
        }
    }

    echo "saya menganti nilai 50000 dengan 100000";
    echo "<br>";
    array_push($tabungan, 20000);
    $tambahTabungan = implode(", ", $tabungan_baru);
    echo "Hari ini saya menabung 20000 maka tabungan saya menjadi : ". $tambahTabungan;
    echo "<br>";
    asort($tabungan);
    $urutanTerkecil = implode(", ", $tabungan_baru);
    echo "Pecahan uang terkecil adalah : " . $urutanTerkecil;
    echo "<br>";
    echo "makanya jumlah tabungan saya sekarang : ";
    echo array_sum($tabungan);

    
?>