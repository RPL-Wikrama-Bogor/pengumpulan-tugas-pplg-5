<?php

$tunj = 0;
$pjk = 0;
$gaji_bersih = 0;
$gaji_pokok = 0;
$name = "";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $tunj = (20 * $gaji_pokok)/ 100;    
    $pjk = 15 * ($gaji_pokok + $tunj) / 100;
    $gaji_bersih = $gaji_pokok + $tunj - $pjk;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" required placeholder="Nama" value="<?php echo $name; ?>"><br>
        <input type="number" name="gaji_pokok" required placeholder="Gaji" value="<?php echo $gaji_pokok; ?>"><br>
        <input type="submit" value="submit" name="submit">
    </form>

    <?php if (isset($_POST['submit'])) : ?>
        <p>Nama: <?php echo $name; ?></p>
        <p>Gaji Pokok: <?php echo $gaji_pokok; ?></p>
        <p>Pajak: <?php echo $pjk; ?></p>
        <p>Tunjangan: <?php echo $tunj; ?></p>
        <p>Gaji Bersih: <?php echo $gaji_bersih; ?></p>
    <?php endif; ?>
</body>
</html>