<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No.16</title>
    <style>
        .number {
            width: 90px;
            height: 90px;
            background-color: #f0f0f0;
            border: 1px solid #000;
            text-align: center;
            margin: 5px;
            display: inline-block;
            line-height: 90px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        for ($i = 1; $i <= 50; $i++) {
            if($i % 2 == 1 ) {
                echo '<div class="number">' . $i . ' ganjil' . '</div>';
            } else { 
                echo '<div class="number">' . $i . ' genap' . '</div>';
            }
        } 
        ?>
    </div>
</body>

</html>