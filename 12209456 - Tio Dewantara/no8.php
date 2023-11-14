<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delapan</title>
</head>
<body><center>
    <h2>NO *</h2>
    <form action="" method="post">
    <input type="number" name="bilangan" placeholder="masukan bilangan "><br></br>
    <button name="submit">PENCET</button><br></br>
</body>
</form>
</html>
<?php
if(isset($_POST['bilangan'])){

    $bilangan = $_POST['bilangan'];

    $satuan= $bilangan %10;
    $puluhan = ($bilangan / 10) % 10;
    $ratusan = ($bilangan /100)%10;

    echo "Satuan:". $satuan."<br>" ;
    echo "Puluhan: ".$puluhan. "<br>";
    echo "Ratusan ". $ratusan. "<br>";
}
?></center>