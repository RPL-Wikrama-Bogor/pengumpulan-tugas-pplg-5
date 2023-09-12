<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="a" id="">
        <input type="number" name="b" id="">
        <input type="number" name="c" id="">
        <input type="submit" value="">
    </form>
</body>
</html>
<?php
if ($_SERVER ['REQUEST_METHOD'] == "POST") {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];

    if ($a < $b && $a < $c) {
        echo $a . "adalah angka terbesar" ;
    }elseif ($b < $a && $b < $c) {
        echo $b . "adalah angka terbesar" ;
    }elseif ($c < $a && $c < $a) {
        echo $c . "adalah angka terbesar" ;
    }else {
        "nilai sama besar" ;
    }
}
?>