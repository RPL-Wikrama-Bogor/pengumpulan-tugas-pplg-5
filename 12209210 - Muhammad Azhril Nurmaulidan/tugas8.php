<!DOCTYPE html>
<html>
<head>
    <title>Nomor 8</title>
</head>
<body>
<form action="#" method="post">
    Masukkan bilangan <br> <input type="text" name="bilangan"> <br><br>
    <input type="submit" name="submit">
</form>

<?php
if(isset($_POST['submit'])) {
    $bilangan = $_POST["bilangan"];
    $satuan = $bilangan % 10;
    $puluhan = ($bilangan / 10) % 10;
    $ratusan = $bilangan / 100;

    echo "Satuan  :  $satuan, Puluhan : $puluhan, Ratusan : $ratusan";
}
?>
</body>
</html>
