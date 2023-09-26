<?php
    $jam = 0;
    $menit = 0;
    $detik = 0;
    $total = 0;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor 5</title>
</head>
<body>
    <form action="" method="post">
        <label for="jam">Jam</label>
        <input type="number" name="jam">
        <br>
        <label for="menit">menit</label>
        <input type="number" name="menit">
        <br>
        <label for="detik">detik</label>
        <input type="number" name="detik">
        <br>
        <input type="submit" name="submit">
    </form>

    <?php
        if(isset($_POST['submit'])){
            $jam = $_POST['jam'];
            $menit = $_POST['menit'];
            $detik = $_POST['detik'];

            $total = ($jam * 3600) + ($menit * 60) + $detik;
            echo "Total: $total detik";
        }
    ?>
</body>
</html>