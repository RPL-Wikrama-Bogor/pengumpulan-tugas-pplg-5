<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No 5</title>
</head>
<body>
    <h3>Mengubah menjadi detik</h3>
    <form action="#" method="post">
        <label for="jam">
        Jam : <input type="number" name="jam"><br><br>
        <label for="menit">
        Menit : <input type="number" name="menit"><br><br>
        <label for="detik">
        Detik : <input type="number" name="detik"><br><br>
        <input type="submit" value="submit" name="submit">
<br><br>
<?php

if(isset($_POST['submit'])){
    
$j = $_POST['jam'];
$m = $_POST['menit'];
$d = $_POST['detik'];
$j = $j *3600;
$m = $m *60;
$total_detik =$j + $m + $d;
echo "Total Detik : $total_detik detik";
}
?>
</body>
</html>