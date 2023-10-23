<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="jmlh" id="" placeholder="Masukan jumlah detik"> <br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
<?php
   
    if ($_SERVER ['REQUEST_METHOD'] == "POST") {
        $a = $_POST['jmlh'] ;

        $jam = (int)($a/3600) ;
        $sisa_detik = $a % 3600 ;
        $menit = (int)($sisa_detik/60) ;
        $sisa_detik = $a % 60 ;

        echo "<br> hasil konversi : $jam jam $menit menit $sisa_detik detik" ;
    }
?>