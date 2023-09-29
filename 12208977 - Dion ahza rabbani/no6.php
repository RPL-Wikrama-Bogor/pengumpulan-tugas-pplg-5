<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<form action="" method="post">
<body>
    <h1>Nomer 6</h1>
    <input type="number" name="total" placeholder="masukan angka!!">
    <button name="submit">Tekan</button>
    
</body></form>
</html>
<?php
if(isset($_POST['submit'])){
    $total=$_POST['total'];
    $jam;
    $jam1;
    $menit;
    
    $detik;
 
if($total>3600)
{
    $jam=floor($total/3600);
    $jam1=$total%3600;
    $menit=floor($jam1/60);
    $detik=$total%60;

    echo "Jam=".$jam;echo"<br>";
    echo "Menit=".$menit;echo"<br>";
    echo "Detik=".$detik;echo"<br>"; 
    
}elseif($total<3600){
    $menit=floor($total/60);
    $detik=$total%60;
    echo "Menit=".$menit;echo"<br>";
    echo "Detik=".$detik;echo"<br>"; 
}else{
    echo "Detik=".$total;
}

}
