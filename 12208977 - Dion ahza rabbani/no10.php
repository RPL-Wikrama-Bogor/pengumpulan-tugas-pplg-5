<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>Nomor 10</h1>
<form action="" method="post">
<body>
    <input type="text" name="mtk" placeholder="MTK">
    <input type="text" name="pabp" placeholder="PABP">
    <input type="text" name="dpk" placeholder="DPK">
    <button name="submit">Submit</button>

</body></form>
</html>
<?php

if(isset($_POST['submit'])){

    $mtk=$_POST['mtk']; 
    $pabp=$_POST['pabp']; 
    $dpk=$_POST['dpk'];
    $rata;
    
    $rata=floor(($mtk+$pabp+$dpk)/3);

    if($rata<=100 && $rata >= 80){
        echo $rata."=A";
    }elseif($rata <80 && $rata>=75){
        echo $rata."=B";
    }elseif($rata<75 && $rata>=65){
        echo $rata."=C";
    }elseif($rata<65&& $rata>=45){
        echo $rata."=D";
    }elseif($rata<45&& $rata>0){
        echo $rata."=E";
    }else{
        echo $rata."belajar lagi";
    }

}