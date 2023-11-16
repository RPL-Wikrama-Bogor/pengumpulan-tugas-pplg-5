<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="post">
        detik
        <input type="number" name="d">
        menit
        <input type="number" name="m">
        jam
        <input type="number" name="j">
        <input type="submit" value="kirim" name="kirim">
    </form>
</body>

</html>

<?php

if (isset($_POST['kirim'])) {
    $jam = $_POST['j'];
    $menit = $_POST['m'];
    $detik = $_POST['d'];

    $hasil = ($jam * 3600) + ($menit * 60) + $detik;

    echo $hasil;
}
