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
 
    <h1>Mencari Nilai Terbesar</h1>
        
        <form action="" method="post">
        <label for="angka1">Masukkan Angka ke-1 :</label>
        <input type="number" name="angka1" id="" >
        <br>
        <label for="angka2">Masukkan Angka ke-2 :</label>
        <input type="number" name="angka2" id="" >
        <br>
        <label for="angka3">Masukkan Angka ke-3 :</label>
        <input type="number" name="angka3" id="" >
        <br>
        <input type="submit" value="Submit"><br>
    </form>
    
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka1 = $_POST["angka1"];
    $angka2 = $_POST["angka2"];
    $angka3 = $_POST["angka3"];

    if($angka1>$angka2 && $angka1>$angka3) {
        echo $angka1;
    } else if ($angka2>$angka1 && $angka2>$angka3) {
        echo $angka2;
    } else{
        echo $angka3;
    }
}
?>