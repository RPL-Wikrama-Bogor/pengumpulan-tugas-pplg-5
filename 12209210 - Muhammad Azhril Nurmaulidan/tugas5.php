<!DOCTYPE html>
<html>
<head>
    <title>Nomor 5</title>
</head>
<body>
    <form method="post" action="#">
        <label>Jam : </label>
        <input type="number" name="jam"><br><br>

        <label>Menit : </label>
        <input type="number" name="menit"><br><br>

        <label>Detik : </label>
        <input type="number" name="detik"><br><br>

        <input type="submit" value="hitung">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jam = $_POST["jam"];
        $menit = $_POST["menit"];
        $detik = $_POST["detik"];

        $total_detik = ($jam * 3600) + ($menit * 60) + $detik;

        echo "<p>Total detik adalah : $total_detik detik</p>";
    }
    ?>
</body>
</html>
