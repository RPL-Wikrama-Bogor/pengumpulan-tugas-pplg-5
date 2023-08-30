<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No.13</title>
    <style>
        
        .number {
            width: 50px;
            height: 50px;
            background-color: #f0f0f0;
            border: 1px solid #000;
            text-align: center;
            margin: 5px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        for ($i = 1; $i <= 50; $i++) {
            // Tambahkan kelas "number-box" ke setiap angka
            echo '<div class="number">' . $i . '</div>';
        }
        ?>
    </div>
</body>

</html>