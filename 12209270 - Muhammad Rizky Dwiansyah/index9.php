<!DOCTYPE html>
<html>
<head>
    <title>Prediksi Cuaca</title>
</head>
<body>
    <h1>Prediksi Cuaca</h1>
    
    <form method="post" action="">
        <label for="temperatur">Masukkan Temperatur (Fahrenheit):</label>
        <input type="number" id="temperatur" name="temperatur"><br>
        
        <input type="submit" name="prediksi" value="Prediksi">
    </form>
    
    <?php
    if (isset($_POST['prediksi'])) {
        $temperatur = $_POST['temperatur'];

        if ($temperatur > 300) {
            $prediksi = "panas";
        } elseif ($temperatur < 250) {
            $prediksi = "dingin";
        } else {
            $prediksi = "normal";
        }

        echo "<h2>Hasil Prediksi Cuaca</h2>";
        echo "Temperatur: " . $temperatur . " Fahrenheit<br>";
        echo "Prediksi Cuaca: " . $prediksi . "<br>";
    }
    ?>
</body>
</html>
