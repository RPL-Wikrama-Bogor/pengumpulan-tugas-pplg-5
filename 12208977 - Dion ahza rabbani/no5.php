<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Nomor 5</h1>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <label for="jam">
        <input type="text" name="jam"placeholder="jam"><br><br>
        <label for="menit">
            <input type="number" name="menit"placeholder="menit"><br><br>
        <label for="detik">
            <input type="number" name="detik" placeholder="detik">
            <button name="submit">Submit</button> <br>

    </form>
</body>
</html>
<?php




if(isset($_POST['submit'])){
    
$jam = $_POST['jam'];
$men = $_POST['menit'];
$d = $_POST['detik'];
$total;




$j = $jam *3600;
$m = $men *60;

$total= $j + $m + $d ;
echo "jam=";
echo $jam;
echo"<br>";
echo "menit=";
echo $men;
echo "<br>";
echo "detik=";
echo $d;
echo "<br>";
echo"total detik=";
echo $total;



}








?>




