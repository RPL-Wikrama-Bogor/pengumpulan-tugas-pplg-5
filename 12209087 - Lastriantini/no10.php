<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <label for="pabp">
            <input type="number" name="pabp"><br><br>
        <label for="mtk">
            <input type="number" name="mtk"><br><br>
        <label for="dpk">
            <input type="number" name="dpk"><br><br>
        <button name="submit">Submit</button> <br>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
$pabp = $_POST['pabp'];
$mtk = $_POST['mtk'];
$dpk = $_POST['dpk'];

$mean = ($pabp + $mtk + $dpk)/3;
if ($mean <= 100 && $mean >= 80) {
    echo "A";
}elseif($mean < 80 && $mean >= 75) {
    echo "B";
}elseif($mean < 75 && $mean >= 65) {
    echo "C";
}elseif($mean < 65 && $mean >= 45) {
    echo "D";
}elseif($mean < 45 && $mean >= 0) {
    echo "E";
}else {
    echo "angka tidak memenuhi persyaratan";
}

}
?>
