<?php
    $tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];

    // memunculkan semua angka
    echo "Uang yang terdapat di tabungan saya adalah: ";
    for($i = 0; $i < count($tabungan); $i++) {
        echo $tabungan[$i] . ", ";
    }

    echo "<br><br>";

    // jumlah tabungan
    echo "Jumlah tabungan saya adalah: " . array_sum($tabungan);

    echo "<br><br>";

    // pecahan uang
    $tabungan_unik = array_unique($tabungan);
    echo "Di dalam tabungan saya terdapat pecahan: ";
    foreach ($tabungan_unik as $angka) {
        echo $angka . ", ";
    }

    echo "<br><br>";

    // pecahan terkecil
    $min = min($tabungan);
    echo "Pecahan uang terkecil adalah: " . $min;

    echo "<br><br>";

    // pecahan terbesar
    $max = max($tabungan);
    echo "Pecahan uang terbesar adalah: " . $max;

    echo "<br><br>";

    // urutan dari yang terkecil ke terbesar
    asort($tabungan);
    echo "Urutan tabungan saya dari terkecil ke terbesar adalah: " . implode(", ", $tabungan);

    echo "<br><br>";

    // urutan dari terbesar ke terkecil
    arsort($tabungan);
    echo "Urutan tabungan saya dari terbesar ke terkecil adalah: " . implode(", ", $tabungan);

    echo "<br><br>";
    

    // mengganti angka 50000 menjadi 100000
    echo "Saya ingin menggabungkan pecahan 50000 ada di tabungan menjadi 100000<br>";

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
    echo "Maka kini uang yang terdapat di tabungan saya adalah " . implode(', ', $tabungan_baru);

    echo "<br><br>";

    // menambahkan angka di akhir
    array_push($tabungan_baru, 20000);
    echo "Uang yang terdapat di tabungan saya adalah " . implode(", ", $tabungan_baru);



    echo "<br><br>";

    // urutan terkecil setelah di tambahkan
    asort($tabungan_baru);
    echo "Jika diurutkan dari yang terkecil kini tabungan saya adalah" . implode(", ", $tabungan_baru);    

    echo "<br><br>";

    // jumlah tabungan terbaru
    echo "Maka jumlah tabungan saya saat ini adalah " . array_sum($tabungan_baru);

?>