<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        Tiket VIP 
        <input type="number" name="vip" min="0" max="50">
        Tiket Eksekutif
        <input type="number" name="eks" min="1" max="50">
        Tiket Ekonomi 
        <input type="number" name="eko" min="1" max="50">
        <input type="submit" value="submit" >
    </form>
</body>
</html>

<?php 

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $vip = $_POST["vip"];  
    $eks = $_POST["eks"];   
    $eko = $_POST["eko"];
    
    if($vip >= 35  ) {
        $keuntungan_vip = ($vip * 50000) *25/100;
    } elseif ($vip < 35 && $vip >= 20) {
        $keuntungan_vip = ($vip * 50000) *15/100;
    }elseif ($vip < 20 && $vip >= 1) {
        $keuntungan_vip = ($vip * 50000) * 5/100;
    }

    if($eks >= 40){
        $keuntungan_eks = ($eks * 30000) * 20/100;
    } elseif ($eks >= 20 && $eks < 40) {
        $keuntungan_eks = ($eks * 30000) * 10/100;
    } else {
        $keuntungan_eks = ($eks * 30000) * 2/100;
        
    }
    $keuntungan_eko = ($eko * 20000) * 7/100;


    $keuntungan_seluruh = $keuntungan_vip + $keuntungan_eks + $keuntungan_eko;
    $total_tiket = $vip + $eks + $eko;

    echo "keuntungan vip : " . number_format($keuntungan_vip) . "<br>";
    echo "keuntungan eksekutif : " . number_format($keuntungan_eks) . "<br>";
    echo "keuntungan ekonomi : " . number_format($keuntungan_eko) . "<br>";
    echo "jumlah yang terjual adalah ". $total_tiket . "<br>";
    echo " Keuntungan seluruhnya adalah ".  number_format($keuntungan_seluruh);
}