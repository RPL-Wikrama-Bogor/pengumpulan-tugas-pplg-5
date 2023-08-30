<?php
if (isset($_POST['submit'])) {
    $tunj;
    $pjk;
    $gaji_bersih;
    $gaji_pokok; 
    $nama;
   
    
    $nama = $_POST['nama'];
    $gaji_pokok = $_POST['gaji'];


    $tunj=(20*$gaji_pokok)/100;
    $pjk=(15*($gaji_pokok+$tunj))/100;
    $gaji_bersih=$gaji_pokok+$tunj-$pjk;

    echo"nama:$nama.<br>";
    echo"tunjangan:$tunj.<br>";
    echo"pajak:$pjk.<br>";
    echo"gaji_bersih:$gaji_bersih.<br>";
    
    
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gaji</title>
</head>
<body>
<form action="" method="post">
     Nama<input type="text" name="nama" ><br>
     <br>Gaji  <input type="text" name="gaji" ><br>
    <br><button type="submit" name="submit">submit</button>
    </form>
</body>
</html>