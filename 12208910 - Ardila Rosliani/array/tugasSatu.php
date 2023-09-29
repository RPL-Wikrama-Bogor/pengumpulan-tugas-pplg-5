<?php
    $tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];

    //menampilkan isi array
    echo "Uang yang terdapat di tabungan saya adalah " ;
    foreach ($tabungan as $jumlah => $isi) {
        echo $isi . " ";
    }
    echo "<br>";

    //menjumlahkan seluruh isi array
    echo "Jumlah tabungan saya adalah " . array_sum($tabungan);

    //menghapus element duplikat dari array
    $uangArr = array_unique($tabungan);
    echo "<br> Didalam tabungan saya terdapat uang pecahan ";
    foreach ($uangArr as $isi) {
    echo $isi . " ";
    } echo "<br>";

    //mencari nilai terkecil
    $nilaiTerkecil= min($tabungan);
    echo "Pecahan uang terkecil adalah " . $nilaiTerkecil . "<br>";

    //mencari nilai terbesar
    $nilaiTerbesar= max($tabungan);
    echo "Pecahan uang terbesar adalah " . $nilaiTerbesar . "<br>";

    //mengurutkan array dari yang terkecil
    echo "urutan pecahan uang dari yang terkecil ";
    $urtKecil = $tabungan;
    asort($urtKecil);
    foreach ($urtKecil as $isi) {
        echo $isi . " ";

    }echo "<br>";

    //mengurutkan array dari yang terbesar
    echo "urutan pecahan uang dari yang terbesar ";
    $urtBesar = $tabungan;
    arsort($urtBesar);
    foreach ($urtBesar as $isi) {
        echo $isi . " ";

    }echo "<br>";

    //mengganti isi array
    echo "saya igin mengganti pecahan 50000 menjadi 100000, maka uang yang berada di tabungan menjadi ";
    array_splice($tabungan, 1, 1, 100000,);
    unset($tabungan[6]);
    foreach ($tabungan as $jumlah => $isi) {
        echo $isi . " ";
    }echo "<br>";

    //menambahkan isi array ke paling belakang
    echo "hari ini saya menabung sebesar 20000, maka kini uang yang berada di tabungan adalah ";
    array_push($tabungan, 20000);
    foreach ($tabungan as $jumlah => $isi) {
        echo $isi . " ";
    }echo "<br>";

    //mengurutkan dari yang terkecil
    echo "Jika diurutkan dari yang terkecil adalah ";
    asort($tabungan);
    foreach ($tabungan as $jumlah => $isi) {
        echo $isi . " ";
    }echo "<br>";

    //menjumlahkan seluruh isi array
    echo "Maka jumlah tabungan saya saat ini adalah " . array_sum($tabungan) . "<br>";
    

?>