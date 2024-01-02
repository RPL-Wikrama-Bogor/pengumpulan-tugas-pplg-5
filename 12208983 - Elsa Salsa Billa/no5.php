<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Konversi Waktu</title>
</head>
<body> 
    
<center>
    <h1>Konversi Waktu</h1>
        
        <form action="#" method="post">
        <label for="jam">Jam</label> <br>
        <input type="number" name="jam" id="" > <br>
        <label for="menit">Menit</label> <br>
        <input type="number" name="menit" id="" > <br>
        <label for="detik">Detik</label> <br>
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
    $jam = $_POST["jam"];
    $menit = $_POST["menit"];
    $detik = $_POST["detik"];
    
    $total = ($jam * 3600) + ($menit * 60) + $detik;
    
    echo "<center> Total Detik: " . $total;
}
?>