<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jumlah detik</title>
</head>
<body>
<form action="" method="post">
    <h1>masukan gram</h1>
     <input type="text" name="tl_gram" ><br>
    <br><button type="submit" name="submit">submit</button>
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $tl_gram;
    $tl_sb;
    $diskon;
    $harga_setelah; 
    
   
    
    $tl_gram = $_POST['tl_gram'];
   

    $tl_sb= 500* $tl_gram;
    $diskon= 5*$tl_sb/100;
    $harga_setelah=$tl_sb-$diskon;

    echo"harga asli:".$tl_sb,"<br>diskon:".$diskon,"<br>harga:".$harga_setelah;
    
    
    }