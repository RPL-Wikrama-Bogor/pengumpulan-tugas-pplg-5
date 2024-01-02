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
        echo '<span class="number">' . $i . "" . '</span>';
    }
    ?>
</body>
<style>
        body {
            font-family: Arial, sans-serif;
        }
        .number {
            display: inline-block;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            background-color: #3498db;
            color: #fff;
            margin: 5px;
            border-radius: 50%;
            font-weight: bold;
        }
    </style>
</html>