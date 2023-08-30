<!DOCTYPE html>
<html>
<head>
    <title>Cek Cuaca</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<body>
    <div class="card" style="width:30rem; padding:4rem;">
    <h1>Cek Cuaca</h1>
    <form method="post" action="">
        <label for="fahrenheit">Masukkan Suhu (°F):</label>
        <input type="number" name="fahrenheit" required class="form-control"><br><br>
        <button type="submit" name="cek" value="Cek Cuaca" class="btn btn-dark">hitung</button>
    </form>

    <?php
    if (isset($_POST['cek'])) {
        // Mengambil suhu dalam satuan Fahrenheit dari form
        $fahrenheit = $_POST['fahrenheit'];

        // Mengonversi suhu dari Fahrenheit ke Celsius
        $celsius = ($fahrenheit - 32) * 5/9;

        // Menentukan cuaca berdasarkan suhu
        $cuaca = '';

        if ($celsius > 30) {
            $cuaca = 'panas';
        } elseif ($celsius < 10) {
            $cuaca = 'dingin';
        } else {
            $cuaca = 'normal';
        }

        // Menampilkan hasil
        echo "<h2>Hasil Cek Cuaca</h2>";
        echo "Suhu dalam Fahrenheit: $fahrenheit °F<br>";
        echo "Suhu dalam Celsius: " . number_format($celsius, 2) . " °C<br>";
        echo "Cuaca: $cuaca";
    }
    ?>
</div>
</body>
</html>
