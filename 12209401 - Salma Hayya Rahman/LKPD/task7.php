<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="gram" id="" placeholder="masukan jumlah gram"> <br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
<?php
if ($_SERVER ['REQUEST_METHOD'] == "POST") {
    $g = $_POST['gram'] ;

    $hs = 5 * $g ;
    $diskon = 0.05 * $hs ;
    $harga = $hs- $diskon ;

    echo "<br>harga sebelum diskon: $hs <br>" ; 
    echo "Diskon                  : $diskon <br>" ;
    echo "harga setelah diskon    : $harga <br>" ;
}
?>