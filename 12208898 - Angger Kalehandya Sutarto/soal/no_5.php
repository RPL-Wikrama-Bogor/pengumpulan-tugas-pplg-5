<?php 
$jam;
$menit;
$detik;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No.5</title>
</head>
<body>
    <h2>Mengkonversi Jam-Menit-Detik ke Total Detik</h2>

    <form action="" method="post">
        <label for="jam">Input Jam:</label>
        <input type="number" name="jam" id="jam">
        <label for="menit">Input Menit:</label>
        <input type="number" name="menit" id="menit">
        <label for="detik">Input Detik:</label>
        <input type="number" name="detik" id="detik">
        <input type="submit" name="submit">
    </form>

    <?php 
    if(isset($_POST['submit'])) {
        $jam = $_POST['jam'];
        $menit = $_POST['menit'];
        $detik = $_POST['detik'];

        $jam = $jam * 3600;
        $menit = $menit * 60;
        $total_detik = $jam + $menit + $detik;

        echo "<h2>Total Detik: $total_detik</h2>";
    }
    ?>
</body>
</html>