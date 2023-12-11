<?php
    $tunj = 0;
    $pjk = 0;
    $gaji_bersih = 0;
    $gaji_pokok = 0;
    $nama;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor 4</title>
</head>
<body>
    <form action="" method="post">
        <label for="nama" >Nama</label>
        <input type="text" name="nama">
        <br>
        <label for="gaji_pokok">Gaji pokok</label>
        <input type="number" name="gaji_pokok">
        <br>
        <input type="submit" name="submit">
    </form>
    <?php
    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $gaji_pokok = $_POST['gaji_pokok'];

        $tunj = (20 * $gaji_pokok) / 100;
        $pjk = (15 * ($gaji_pokok + $tunj)) / 100;
        $gaji_bersih = $gaji_pokok + $tunj - $pjk;

        echo "<p></p> Nama: $nama <br> Tunjangan: $tunj <br> Pajak: $pjk <br> Gaji bersih: $gaji_bersih</p>";
    }
    ?>
</body>
</html>