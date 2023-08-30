<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suhu</title>
</head>
<body>
<form action="" method="post">
    <h1> masukan suhu fathrenheit</h1>
   <input type="text" name="fh" ><br>
    <br><button type="submit" name="submit">submit</button>
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $fh;
    $suhu_c;

    
    $fh = $_POST['fh'];
   

    $suhu_c =$fh* 5/9 x ($fh – 32) ;

    if ($suhu_c > 300) {
        echo"<h2>suhu sekarang adalah panas</h2>";
       
    } elseif ($suhu_c < 250) {
        echo"<h2>suhu sekarang adalah dingin</h2>";}
    else{
        echo"<h2>suhu sekarang adalah normal</h2>";
    }

    
    }