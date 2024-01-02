<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<form action="" method="post">
<body>
<h1>Nomor 4</h1>
<input type="text" name="nama" placeholder="nama">
<input type="text" name="gaji" placeholder="Gajipokok">
<button name="submit">Submit</button> <br>
</body></form>
</html>



<?php
if(isset($_POST['submit'])){
$nama=$_POST['nama'];
$gaji= $_POST['gaji'];
$tunj;
$pajak;
$gajibersih;

$tunj=($gaji*20)/100;
$pajak=($gaji+$tunj)*15/100;
$gajibersih=$gaji+$tunj-$pajak;
echo $nama;echo"<br>";
echo"gaji pokok";echo"<br>";
echo $gaji;echo "<br>";
echo"tunjangan";echo"<br>";
echo $tunj;echo "<br>";
echo"pajak";echo"<br>";
"<br>";
echo $pajak;echo"<br>";
echo "gaji bersih";
echo "<br>";
echo $gajibersih;
}

?>
