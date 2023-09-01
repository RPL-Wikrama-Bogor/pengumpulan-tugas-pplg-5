<!DOCTYPE html>
<html>
<head>
    <title>Cetak Bilangan 1-50</title>
</head>
<body>
    <h1>Cetak Bilangan 1-50</h1>
    
    <h2>Menggunakan While Loop</h2>
    <ul>
    <?php
    $i = 1;
    while ($i <= 50) {
        echo "<li>$i</li>";
        $i++;
    }
    ?>
    </ul>
    
    <h2>Menggunakan For Loop</h2>
    <ul>
    <?php
    for ($i = 1; $i <= 50; $i++) {
        echo "<li>$i</li>";
    }
    ?>
    </ul>
</body>
</html>


