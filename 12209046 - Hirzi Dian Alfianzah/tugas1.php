<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 1 Ka Fema</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
        }

        h3 {
            color: #666;
        }

        hr {
            border: 1px solid #ddd;
            margin: 20px 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hirzi Dian Alfianzah</h2>
        <h3>12209046 - </h3>
        <h3>Cicurug 5 - </h3> 
        <h3>PPLG XI-5</h3>
        <br>
        <?php
 $tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000,20000];
    //Soal 1
    echo "Soal 1 = Menampilkan Isi Array <br>";

    $angka = implode(",", $tabungan);
    echo "Uang yang terdapat di tabungan saya adalah: <b>" . $angka . "</b>";
    
    echo "<hr>";
    //Soal 2
    echo "Soal 2 Menjumlahkan Isi Array<br>";

    echo "Jumlah Tabungan saya adalah: <b> " . array_sum($tabungan) . "</b>";
    
    echo "<hr>";
    //Soal 3
    echo "Soal 3 Menjadikan satu yang nabungnya sama 2 kali<br>";

    $pecahan = array_unique($tabungan);
    echo "Didalam tabungan saya terdapat uang pecahan: <b> " . $pecahan2 = implode(",", $pecahan) . "</b>";

    echo "<hr>";
    //Soal 4
    echo "Soal 4 = Mencari Bilangan terkecil <br>";

    echo "Pecahan uang terkedil adalah : <b> " . min($tabungan) ."</b>";

    echo "<hr>";
    //Soal 5
    echo "Soal 5 = Mencari bilangan terbesar <br>";

    echo "pecahan uang terbesar adalah : <b>". max($tabungan) . "</b>";

    echo "<hr>";
    //Soal 6
    echo "Soal 6 = mengurutkan dari yang terkecil <br>";

    asort($tabungan); 
    echo "Jika diurutkan dari yang terkecil maka uang yang berada di tabungan adalah : <b> " . implode(",", $tabungan) . "</b>";

    echo "<hr>";
    //Soal 7
    echo "Soal 7 = Mengurutkan dari yang terbesar <br>";

    arsort($tabungan);
    echo "Jika didiurutkan dari yang terbesar maka uang yang berada di tabungan adalah : <b> " . implode(",",$tabungan) . "</b>";

    //soal 8
    echo "<hr>";

    echo "Soal 8. Saya ingin menggabungkan pecahan <b>50000</b> yang ada di tabungan menjadi <b>100000</b><br>";

    $nilaiGocap = false;
    
    foreach ($tabungan as $key => $nilai) {
        if ($nilai == 50000 && !$nilaiGocap) {
            $tabungan[$key] = 100000;
            $nilaiGocap = true;
        } elseif ($nilai == 50000) {
            unset($tabungan[$key]);
            break;
        }
    }
    $tabungan = array_values($tabungan);
    echo"mengati".implode(",",$tabungan);

    echo "<hr>";
    //Soal 9
    echo "Soal 9 = Menambahkan array <br>";

    array_push($tabungan,20000);
    echo "hari ini saya menabung sebesar 20000, maka kini uang yang berada di tabungan saya adalah : <b> " . implode(",", $tabungan) . "</b>"; 

    echo "<hr>";
    //Soal 10
    echo "Soal 10 = mengurutkan tabungan yang sudah di input tadi <br>";

    asort($tabungan);
    echo "Jika diurutkan dari yang terkecil kini tabugngan saya adalah : <b>" . implode(",",$tabungan) . "</b>";
    
    echo "<hr>";
    //Soal 11
    echo "Soal 11 = Menjumlahkan <br>";
    
    echo "Maka jumlah tabungan saya saat ini adalah : <b> " . array_sum($tabungan) . "</b>";

?>
</div>
</body>
</html>



