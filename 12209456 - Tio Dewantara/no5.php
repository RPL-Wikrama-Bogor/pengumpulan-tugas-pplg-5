<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lima</title>
</head>
<body>
    <center>
        <h2>NO 5</h2>
    <form action="" method="post">
    <input type="number" name="jam" placeholder="jam"><br></br>
    <input type="number" name="menit" placeholder="menit"><br></br>
    <input type="number" name="detik" placeholder="detik"><br></br>
    <button name="submit">PENCET</button><br></br>

</body>
</form>
</html>
<?php
if (isset($_POST['submit'])){

$jam = $_POST['jam'];
$menit = $_POST['menit'];
$detik =$_POST['detik'];


$total = $jam * 3600 + $menit * 60 + $detik;


echo "Total detik: $total detik";
}
?>
</center>