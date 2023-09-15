<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="jam" id="" placeholder="jumlah jam"><br><br>
        <input type="number" name="menit" id="" placeholder="jumlah menit"><br><br>
        <input type="number" name="detik" id="" placeholder="jumlah detik"><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
<?php
    

    if ($_SERVER ['REQUEST_METHOD'] == "POST") {
        $j = $_POST['jam'] ;
        $m = $_POST['menit'] ;
        $d = $_POST['detik'] ;
        
        $hasil = ($j * 3600) + ($m * 60) + $d ;

        echo "<br> Jumlah detik dari ".$j."jam ".$m."menit ".$d."detik adalah : " . $hasil ;
    }
?>