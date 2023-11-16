<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        Suhu (F)
        <input type="number" name="F">
        <input type="submit" value="send" name="kirim">
    </form>
</body>
</html>

<?php 

if(isset($_POST['kirim'])){
    $f = $_POST['F'];

    $c = ($f - 32) * 5/9;

    echo $c;
    if ($c > 300 ) {
        echo " Panas";
    } elseif ($c > 250 ) {
        echo " Dingin";
    } else {
        echo " Normal";
    }
}