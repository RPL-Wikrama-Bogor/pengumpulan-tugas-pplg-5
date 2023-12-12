<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>Nomor 9</h1>
<form action="" method="post">
<body>
    <input type="number" name="suhu" placeholder="cek suhu!">
    <button name="submit">Cek</button>
    
</body>
</form>
</html>

<?php

if(isset($_POST['submit'])){
    $suhu=$_POST['suhu'];
   // $far;

    //$far=$suhu/33.8;

    if($suhu>=300){
        echo "panas euy";
    }elseif($suhu<=250){
        echo "tirizz";
    }else{
        echo "normal";
    }
    
    
    
    

}