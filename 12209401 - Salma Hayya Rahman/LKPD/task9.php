<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <input type="number" name="suhufah" id="" placeholder="Suhu fahrenheit"> <br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
<?php
    if ($_SERVER ['REQUEST_METHOD'] == "POST") {
        $suhuf = $_POST['suhufah'] ;

        $suhuc = ($suhuf - 32) * 5/9  ;
        if ($suhuc >= 300) {
            echo (int)$suhuc . " Suhu panas" ;
        }elseif ($suhuc >= 250 && $suhuc <300) {
            echo  (int)$suhuc . " Suhu dingin" ;
        }elseif($suhuc < 250) {
            echo (int)$suhuc . " Suhu normal" ;
        }
    }
?>