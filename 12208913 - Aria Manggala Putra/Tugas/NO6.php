<!DOCTYPE html>
<html>
<head>
    <title>Nomer 6</title>
</head>
<body>

    <form action="" method="post">
        <label for="totalDetik">Masukkan total detik:</label>
        <input type="number" name="totalDetik" id="totalDetik" required>
        <br>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $totalDetik = intval($_POST["totalDetik"]);
        
        $jam = floor($totalDetik / 3600);
        $sisaDetik = $totalDetik % 3600;
        $menit = floor($sisaDetik / 60);
        $detik = $sisaDetik % 60;

      
        if ($jam > 0) {
            echo "$jam jam ";
        }
        if ($menit > 0) {
            echo "$menit menit ";
        }
        echo "$detik detik";
    }
    ?>
</body>
</html>
