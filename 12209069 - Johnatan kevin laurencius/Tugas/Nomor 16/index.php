<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor 16</title>
</head>
<body>
    <?php
        for ($i = 1; $i <= 50; $i++) {
            if($i%2 == 1 ) {
                echo " <p> $i bilangan ganjil </p>";
            }else {
                echo " <p> $i bilangan genap </p>";
            }
        }
    ?>
</body>
</html>