<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
       for ($i = 1; $i <= 50; $i++) {
        if($i %2 == 0) {
            echo '<span class="number">' . "$i Genap" . " " . '</span>';
        } else {
            echo '<span class="number">' . "$i Ganjil" . " " .'</span>';
        }
    }
    ?>
</body>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .number {
        display: inline-block;
        line-height: 30px;
        text-align: center;
        background-color: #3498db;
        color: #fff;
        margin: 5px;
        font-weight: bold;
        padding: 5px;
        border-radius: 7px;
    }
</style>
</html>
