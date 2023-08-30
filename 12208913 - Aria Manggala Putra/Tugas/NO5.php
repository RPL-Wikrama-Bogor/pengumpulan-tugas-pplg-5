<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomer 5</title>
</head>
<body>
    <?php  
    $jam = "";
    $menit = "";
    $detik = "";
    $total = 0;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $jam = $_POST["jam"];
        $menit = $_POST["menit"];
        $detik = $_POST["detik"];

        $total = ($jam * 3600) + ($menit * 60) + $detik;


    }
    ?>
    <form action="" method="post">
        <label for="jam">Jam:</label>
        <input type="number" id="jam" name="jam" value="<?php echo $jam; ?>" required><br><br>
        <label for="menit">menit:</label>
        <input type="number" id="menit" name="menit" value="<?php echo $menit; ?>" required><br><br>
        <label for="detik">detik:</label>
        <input type="number" id="detik" name="detik" value="<?php echo $detik; ?>" required><br><br>
        <input type="submit" value="Submit">
    </form>


        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h2>Hasil Konversi Ke Detik</h2>
        <p>Hasil =<?php echo "$total"; ?></p>
    <?php endif; ?>


</body>
</html>