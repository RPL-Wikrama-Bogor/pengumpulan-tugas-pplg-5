<!DOCTYPE html>
<html>
<head>
    <title>Nomer 9</title>
</head>
<body>
    <form action="" method="post">
        <label for="suhu">Masukkan suhu dalam Fahrenheit:</label>
        <input type="number" step="any" name="suhu" id="suhu" required>
        <br>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $suhuFahrenheit = floatval($_POST["suhu"]);
        
        $suhuCelsius = ($suhuFahrenheit - 32) * 5/9;

        if ($suhuCelsius > 30) {
            echo "Suhu panas";
        } elseif ($suhuCelsius >= 25) {
            echo "Suhu normal";
        } else {
            echo "Suhu dingin";
        }
    }
    ?>
</body>
</html>
