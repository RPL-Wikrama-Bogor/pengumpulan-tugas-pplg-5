<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<form action="" method="post">
<body>
    <h1>Nomer 7</h1>
    <input type="text" name="total" placeholder="Masukan Gram">
    <button name="submit">Timbang</button>
    
</body></form>
</html>
<?php
if(isset($_POST['submit'])){
    $gram=$_POST['total'];
    $sebelum;
    $sesudah;
    $diskon;

    if($gram<100){
        echo"Tambah lagi buahnya";
    }else{
        $sebelum=$gram*500/100;
        $diskon=$sebelum*5/100;
        $sesudah=$sebelum-$diskon;

        echo "Total Gram=".$gram;echo"<br>";
        echo "Harga Awal=".$sebelum;echo"<br>";
        echo "Diskon=".$diskon;echo"<br>";
        echo "Harga Setelah diskon=".$sesudah;echo"<br>";

    }


}