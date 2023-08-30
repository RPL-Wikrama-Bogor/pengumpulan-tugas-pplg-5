<!DOCTYPE html>
<html>
<head>
    <title>Menghitung Bilangan</title>
</head>
<body>
    <h2>Menghitung Bilangan</h2>
    <form method="post">
        Masukkan 20 bilangan:<br>
        <?php
        for ($i = 1; $i <= 20; $i++) {
            echo "<input type='number' name='bilangan[]' step='any' required><br>";
        }
        ?>
        <input type="submit" value="Hitung">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bilanganArray = $_POST["bilangan"];
        $min = min($bilanganArray);
        $max = max($bilanganArray);
        $total = array_sum($bilanganArray);
        $average = $total / count($bilanganArray);

        echo "<br>";
        echo "Bilangan terkecil: $min<br>";
        echo "Bilangan terbesar: $max<br>";
        echo "Rata-rata: $average<br>";
    }
    ?>
</body>
</html>