<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tujuh</title>
</head>
<body><center>
    <h2>NO &</h2>
    <form action="" method="post">
        <input type="number" name="total" placeholder="masukan tolat gram"><br></br>
        <button name="submit"> PENCET</button><br></br>
    
</body>
</form>
</html>

<?php
if(isset($_POST['submit'])){

$total = $_POST['total'];

if ($total<100) {
    echo "minimal 100 gram";
}else {
    $harga_sebelum = 50* $total; 
$diskon = 5* $harga_sebelum/100;
$harga_setelah =$harga_sebelum - $diskon;

echo" harga sebelum: ".$harga_sebelum. "<br>";
echo "diskon: " .$diskon ."<br>";
echo "harga setelah:" .$harga_setelah. "<br>";
}


}



?></center>