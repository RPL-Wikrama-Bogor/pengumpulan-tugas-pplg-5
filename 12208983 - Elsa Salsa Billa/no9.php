<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cuaca</title>
</head>
<body> 
    
<center>
    <h1>Suhu Cuaca</h1>
        
        <form action="" method="post">
        <label for="suhu_fah">Masukkan Suhu Cuaca (Fahrenheit)</label> <br>
        <input type="number" name="suhu_fah" id="" ><br><br>
        
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
    $suhu_fah = $_POST["suhu_fah"];

    $suhu_cel = ($suhu_fah - 32) * 5 / 9;
    
    if ($suhu_cel > 30) {
        echo "Cuaca Panas";
    } else if ($suhu_cel < 25) {
        echo "Cuaca Dingin";
    } else {
        echo "Cuaca Normal";
    }
}

?>