<?php
    $tunj;
    $pjk;
    $gaji_bersih;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LKPD 4</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Nama:</label>
        <input type="text" name="nama" id="nama">
        <label for="">Gaji Pokok</label>
        <input type="nnumber" name="gaji_pokok" id="gaji_pokok">
        <input type="submit" name="submit">
    </form>

    <?php
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $gaji_pokok = $_POST['gaji_pokok'];
        $tunj = (20 * $gaji_pokok) / 100;
        $pjk = (15 * ($gaji_pokok + $tunj)) / 100;
        $gaji_bersih = ($gaji_pokok + $tunj - $pjk);
        
        echo "Nama: $nama <br> Tunjangan: $tunj <br> Gaji Bersih: $gaji_bersih";
    }
    ?>
</body>
</html>