<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jumlah detik</title>
</head>
<body>
<form action="" method="post">
     bilangan<input type="text" name="bilangan" ><br>
    <br><button type="submit" name="submit">submit</button>
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $bilangan;
    $satuan;
    $puluhan;
    $ratusan; 
    
   
    
    $bilangan = $_POST['bilangan'];
   

    $satuan= $bilangan % 10;
    $puluhan= ($bilangan / 10)%10;
    $ratusan=$bilangan/100;

    echo"rattusan:".$ratusan,"<br>puluhan".$puluhan,"<br>satuan".$satuan;
    
    
    }

