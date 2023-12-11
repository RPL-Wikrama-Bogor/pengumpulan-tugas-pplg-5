<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Nomor 12</h1>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <label for="jam">
        <input type="text" name="jam"placeholder="jam"><br><br>
        <label for="menit">
           <input type="number" name="menit"placeholder="menit"><br><br>
        <label for="detik">
            <input type="number" name="detik" placeholder="detik">
            <button name="submit">Submit</button> <br>

    </form>
</body>
</html>
<?php

if(isset($_POST['submit'])){
$j =$_POST['jam'];
$m =$_POST['menit'];
$d =$_POST['detik'];

   $d=$d+1;
   if($d>=60){
    $m=$m+1;
    $d=00;

    }if($m>=60){
        $j=$j+1;
        $m=00;
        $d=00;
    } if($j>=24){
        $j=00;
        $m=00;
        $d=00;
    }else{
        echo $j."-".$m."-".$d;
    }
  
   

   





}



?>