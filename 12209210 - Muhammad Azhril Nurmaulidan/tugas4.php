<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor 4</title>
</head>
<body>
<form action="#" method="post" name="formAngka">
    Masukkan Nama <br> <input type="text" name="nama"> <br><br>
    gaji_pokok <br> <input type="number" name="gaji_pokok"> <br><br>
    <input type="submit" name="submit">
</form>

<?php
if(isset($_POST['submit'])) {
    $tunj = 0;
    $pjk = 0;
    $gaji_bersih = 0;
    $gaji_pokok = isset($_POST['gaji_pokok']);
    $nama = isset($_POST['nama']);

    $tunj = (20 * $gaji_pokok / 100);
    $pjk = (15 * ($gaji_pokok + $tunj)) / 100;
    $gaji_bersih = $gaji_pokok + $tunj - $pjk;

    echo "$nama, Tunjangan: $tunj, Pajak: $pjk, Gaji Bersih: $gaji_bersih";
}
?>

</body>
</html>
