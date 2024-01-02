<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>duabelas</title>
</head>
<body><center>
    <form action="" method="post">
        <input type="number" name="jam" placeholder="Jam">
        <input type="number" name="menit" placeholder="menit">
        <input type="number" name="detik" placeholder="detik"><br></br>
        <button name="submit">PENCET</button><br></br>
    
</body>
</form>
</html>
<?php 
if(isset($_POST['submit'])){

    $jam=$_POST['jam'];
    $menit=$_POST['menit'];
    $detik=$_POST['detik'];

    $detik = $detik + 1;

    if ($detik >=60) {
        $menit =$menit + 1 ;
        $detik =00;
    }if ($menit >=60) {
        $jam =$jam + 1;
        $menit =00;
        $detik =00;
    }if ($jam>=24) {
        $jam =00;
        $menit =00;
        $detik=00;
    }else {
    echo "Jam ". $jam. ":".$menit.":". $detik;
    } 
}

?>
</center>