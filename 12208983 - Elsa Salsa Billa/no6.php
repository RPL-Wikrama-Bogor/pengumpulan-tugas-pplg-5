<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Konversi</title>
</head>
<body> 
    
<center>
    <h1>Konversi Detik</h1>
        
        <form action="" method="post">
        <label for="detik">Detik</label>
        <input type="number" name="detik" id="" > <br>
        <input type="submit" value="Submit">
    </form>
    </form>
</div>
</div>
</center>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $detik = $_POST["detik"];
    
    $jam = floor($detik / 3600);
    $sisa_detik = $detik % 3600;
    $menit = floor($sisa_detik / 60);
    $detik = $sisa_detik % 60;
    
    echo "<br><center> Hasil Konversi: " . $jam . " jam " . $menit . " menit " . $detik . " detik";
}
?>