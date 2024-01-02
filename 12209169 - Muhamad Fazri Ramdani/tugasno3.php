<!DOCTYPE html>
<html>
<head>
    <title>Temukan Angka Terbesar</title>
</head>
<body>
    <h1>Temukan Angka Terbesar</h1>
    
    <?php
    $bilangan1 = isset($_POST["bilangan1"]) ? $_POST["bilangan1"] : "";
    $bilangan2 = isset($_POST["bilangan2"]) ? $_POST["bilangan2"] : "";
    $bilangan3 = isset($_POST["bilangan3"]) ? $_POST["bilangan3"] : "";
    $terbesar = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $terbesar = max($bilangan1, $bilangan2, $bilangan3);
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="bilangan1">Bilangan 1:</label>
        <input type="number" id="bilangan1" name="bilangan1" value="<?php echo $bilangan1; ?>"><br><br>
        
        <label for="bilangan2">Bilangan 2:</label>
        <input type="number" id="bilangan2" name="bilangan2" value="<?php echo $bilangan2; ?>"><br><br>
        
        <label for="bilangan3">Bilangan 3:</label>
        <input type="number" id="bilangan3" name="bilangan3" value="<?php echo $bilangan3; ?>"><br><br>
        
        <input type="submit" value="Cari Terbesar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <h2>Hasil:</h2>
        <?php if ($terbesar !== "") { ?>
            <p>Bilangan terbesar adalah: <?php echo $terbesar; ?></p>
        <?php } else { ?>
            <p>Masukkan tiga bilangan untuk menemukan yang terbesar.</p>
        <?php } ?>
    <?php } ?>
</body>
</html>