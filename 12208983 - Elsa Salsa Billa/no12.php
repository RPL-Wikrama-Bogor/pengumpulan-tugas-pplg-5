<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Penambahan Detik</title>
</head>
<body> 
    <style>
        body {
            background-color: #AEC3AE;
        }
        .card{
            background-color: #f2f2f2;
            border-radius: 10px;
            width: 30%;
            height: 350px;
            margin: 100px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding : 20px;
        }
    </style>
    <center>
    <div class="card">
    <h1>Penambahan Detik</h1>
        
        <form action="" method="post">
        <label for="j">Jam :</label>
        <input type="number" name="j" id="" >
        <br>
        <label for="m">Menit :</label>
        <input type="number" name="m" id="" >
        <br>
        <label for="d">Detik :</label>
        <input type="number" name="d" id="" >
        <br>
        <input type="submit" value="Submit"><br>
    </form>
    
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $j = $_POST["j"];
    $m = $_POST["m"];
    $d = $_POST["d"];

    echo "Sebelum Dikonversi :<br>". $j . " : " . $m . " : " . $d ."<br>";

    $d = $d + 1;

    if($d>=60) {
        $m = $m + 1;
        $d = 00;
    } 
    
    if ($m>=60) {
        $j = $j + 1;
        $m = 00;
    }
    if ($j>=24) {
        $j = 00;
        $m = 00;
    }

        echo "Setelah Dikonversi :<br>" . $j . " : " . $m . " : " . $d;
}