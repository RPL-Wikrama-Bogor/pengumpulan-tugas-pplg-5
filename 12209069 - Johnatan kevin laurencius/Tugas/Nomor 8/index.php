<?php
    $bilangan = 0;
    $satuan = 0;
    $puluhan = 0;
    $ratusan = 0;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="bilangan">Bilangan</label>
        <input type="number" name="bilangan">
        <input type="submit" name="submit">
    </form>

    <?php
        if(isset($_POST['submit'])) {
            $bilangan = $_POST['bilangan'];

            $satuan = $bilangan % 10;
            $puluhan = ($bilangan / 10) %10;
            $ratusan = floor($bilangan / 100) %10;

            echo "<p> Ratusan: $ratusan <br> Puluhan: $puluhan <br> Satuan: $satuan </p>";
        }
    ?>
</body>
</html>