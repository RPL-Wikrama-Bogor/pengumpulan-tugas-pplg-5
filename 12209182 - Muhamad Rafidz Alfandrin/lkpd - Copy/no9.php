<!DOCTYPE html>
<html>
<head>
    <title>Mencetak temperatur</title>
</head>
<body>
    <h1>Mencetak temperatur</h1>
    <form action="" method="post">
        <label for="suhu_fahrenheit">Suhu fahrenheit:</label>
        <input type="number" name="suhu_fahrenheit" required><br>
        <br>
        <input type="submit" name="submit" value="Input" >
    </form>
</body>
</html>

<?php
 if (isset($_POST['submit'])) {
    $suhu_fahrenheit = $_POST['suhu_fahrenheit'];
    $suhu_celcius = 5/9 * ($suhu_fahrenheit - 32);

    if ($suhu_celcius > 300) {
        echo "Cuaca: Panas";
    } elseif ($suhu_celcius > 250) {
        echo "Cuaca: Dingin";
    } else {
        echo "Cuaca: Normal";
    }
}
?>