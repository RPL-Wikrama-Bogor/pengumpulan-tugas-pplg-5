<!DOCTYPE html>
<html>
<head>
    <title>Nomor 9</title>
</head>
<body>
<form action="#" method="post">
    Suhu fahrenheit <br> <input type="text" name="suhu_f"> <br><br>
    <input type="submit" name="submit"><br><br>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $suhu_fahrenheit = $_POST["suhu_f"];
    
    $suhu_celcius = ($suhu_fahrenheit - 32) * 5/9;

    if ($suhu_celcius > 300) {
        echo "panas";
    } elseif ($suhu_celcius > 250) {
        echo "dingin";
    } else {
        echo "normal";
    }
}
?>
</body>
</html>
