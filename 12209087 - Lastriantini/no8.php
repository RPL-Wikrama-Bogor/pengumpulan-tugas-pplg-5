<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <label for="bil">
            <input type="number" name="bil"><br><br>
        <button name="submit">Submit</button> <br>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
$bil = $_POST['bil'];
$satuan = $bil % 10;
$puluhan = (intdiv($bil, 10))%10;
$ratusan = intdiv($bil, 100);

echo "Satuan : ". $satuan. "<br> Puluhan : " . $puluhan. "<br> Ratusan : ". $ratusan;
}
?>
