<?php
    $suhu_farenheit = 0;
    $suhu_celcius = 0;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor 9</title>
</head>
<body>
    <form action="" method="post">
        <label for="suhu_farenheit">Suhu Farenheit</label>
        <input type="number" name="suhu_farenheit">
        <input type="submit" name="submit">
    </form>

    <?php
        if(isset($_POST['submit'])) {
            $suhu_farenheit = $_POST['suhu_farenheit'];

            $suhu_celcius = ($suhu_farenheit - 32) * 5/9;

            if($suhu_celcius > 300) {
                echo "Panas";
            }else if($suhu_celcius > 250) {
                echo "Normal";
            }else{
                echo "Dingin";
            }
        }
    ?>
</body>
</html>