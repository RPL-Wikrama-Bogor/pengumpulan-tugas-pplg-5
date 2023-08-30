<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Kode Pegawai</title>
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
    <h1>Kode Pegawai</h1>
        
        <form action="" method="post">
        <label for="bil">Masukkan kode :</label> <br>
        <input type="number" name="bil" id="" > <br>
        <input type="submit" value="Submit">
    </form>
    </form>

</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bil = $_POST["bil"];
    $length = strlen($bil);

    if ($length == 11) {
        $no_gol = substr($bil, 0, 1);
        $tgl = substr($bil, 1, 2);
        $bln = substr($bil, 3, 2);
        $thn = substr($bil, 5, 4);
        $no_urut = substr($bil, 9, 2);

    if($bln=="01") {
        $bln = "Januari";
    } else if ($bln=="02"){
        $bln = "Februari";
    } else if ($bln=="03"){
        $bln = "Maret";
    } else if ($bln=="04"){
        $bln = "April";
    } else if ($bln=="05"){
        $bln = "Mei";
    } else if ($bln=="06"){
        $bln = "Juni";
    } else if ($bln=="07"){
        $bln = "Juli";
    } else if ($bln=="08"){
        $bln = "Agustus";
    } else if ($bln=="09"){
        $bln = "September";
    } else if ($bln=="10"){
        $bln = "Oktober";
    } else if ($bln=="11"){
        $bln = "November";
    } else{
        $bln = "Desember";
    }

    $tgllahir = ("$tgl-" . "$bln-" . $thn);

    echo "<br> No Golongan = $no_gol <br>
        Tanggal Lahir = $tgllahir <br>
        No Urut = $no_urut <br>";

    }
    else{
        echo "No Pegawai Tidak Sesuai";
    }

   
}