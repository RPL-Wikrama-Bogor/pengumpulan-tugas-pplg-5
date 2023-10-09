<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bilangan</title>
</head>
<body> 
    
<center>
    <h1>Konversi Bilangan</h1>
        
        <form action="" method="post">
        <label for="bilangan">Masukkan Bilangan</label> <br>
        <input type="number" name="bilangan" id="" > <br>
        
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
    $bilangan = $_POST["bilangan"];
    
    $satuan = $bilangan % 10;
    $puluhan = (int) ($bilangan / 10) % 10;
    $ratusan = (int) ($bilangan / 100);
    
    echo "<br><center> Hasil Konversi: " . $ratusan . " ratusan " . $puluhan . " puluhan " . $satuan . " satuan";
}
?>
