<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jumlah detik</title>
</head>
<body>
<form action="" method="post">
     jam:<input type="text" name="jam" ><br>
     <br>menit:  <input type="text" name="menit" ><br>
     <br>detik:  <input type="text" name="detik" ><br>
    <br><button type="submit" name="submit">submit</button>
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $j;
    $m;
    $d;
    $total; 
    
   
    
    $j = $_POST['jam'];
    $m = $_POST['menit'];
    $d = $_POST['detik'];

    $total=$j*3600+$m*60+($d);
    echo "<br>jumlah detik adalah ".$total;

    
    
    }