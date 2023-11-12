<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Menentukan Grade</title>
</head>
<body> 
<style>
        body{
            background-color: #D7C0AE;
        }
        .card{
            background-color: #f2f2f2;
            border-radius: 10px;
            width: 25%;
            height: 300px;
            margin: 100px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding : 20px;
        }
    </style>
<center>
<div class="card">
    <h1>Menentukan Grade</h1>
        
        <form action="" method="post">
        <label for="vip">Vip</label> <br>
        <input type="text" name="vip" id="" > <br>
        <label for="ekse">Eksekutif</label> <br>
        <input type="number" name="ekse" id="" > <br>
        <label for="eko">Ekonomi</label> <br>
        <input type="number" name="eko" id="" > <br>
        
        <input type="submit" value="Submit">
    </form>
    </div>
</div>
</div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tiket [] = $_POST['vip'];
    $tiket [] = $_POST['ekse'];
    $tiket [] = $_POST['eko'];
    
    $vip = $tiket[0];
    $ekse = $tiket[1];
    $eko = $tiket[2];

    if($vip>=40) {
        $keu_vip =25;
    } else if ($vip>=20 && $vip<40) {
        $keu_vip = 15;
    } else if ($vip>0 && $vip<20) {
        $keu_vip = 5;
    } else{
        $keu_vip = 0;
    }

    if ($ekse >= 40) {
        $keu_ekse = 20;
    }
    elseif ($ekse >= 20 && $ekse <40) {
        $keu_ekse = 10;
    }
    elseif ($ekse <20 &&  $ekse >0) {
        $keu_ekse = 2;
    }
    else{
        $keu_ekse = 0;
    }

    if ($eko>0 && $eko <=50) {
        $keu_eko= 7;
    }
    else {
        $keu_eko= 0;
    }

    $seluruh_keuntungan = $keu_vip + $keu_ekse + $keu_eko;
    $total = array_sum($tiket);

    echo "<br>";
        echo "Keuntungan Seluruh Kelas = $seluruh_keuntungan%";
        echo "<br>";
        echo "Keuntungan Kelas VIP = $keu_vip%";
        echo "<br>";
        echo "Keuntungan Kelas Eksekutif = $keu_ekse%";
        echo "<br>";
        echo "Keuntungan Kelas Ekonomi = $keu_eko%";
        echo "<br>";

        echo "<br>";
        echo "Jumlah Seluruh Tiket yang Terjual = $total tiket dari 150 tiket";
        echo "<br>";
        echo "Jumlah Tiket VIP yang Terjual = $vip tiket dari 50 tiket";
        echo "<br>";
        echo "Jumlah Tiket Eksekutif yang Terjual = $ekse tiket dari 50 tiket";
        echo "<br>";
        echo "Jumlah Tiket Ekonomi yang Terjual = $eko tiket dari 50 tiket";
    }


    ?>
