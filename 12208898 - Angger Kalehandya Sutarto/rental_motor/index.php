<?php
require 'controllers.php';
$control = new rental();
$control->setHargaMotor(50000, 70000, 80000, 100000);

var_dump($control->getHargaMotor());
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>

<body>
    <center>
       <form action="" method="post">
        <h2>Rental Motor</h2>
        <label for="nama">Nama pengguna: </label>
        <input type="text" name="nama" id="nama"><br>

        <label for="jumlah_hari">Jumlah hari peminjaman: </label>
        <input type="number" name="rental" id="jumlah_hari"><br>

        <label for="">Jenis Motor: </label>
        <select name="jenis_motor" id="">
            <option value="" selected hidden>- - Pilih Motor - -</option>
            <option value="supra">Supraks</option>
            <option value="beat">Beat</option>
            <option value="astrea">Astrea</option>
            <option value="shogun">Shogun</option>
        </select><br>

        <input type="submit" name="submit" value="pinjam!!!">
       </form>
    </center> <br>
    <?php 
    if(isset($_POST['submit'])) {
        $control->nama_pengguna = $_POST['nama'];
        $control->jumlah_hari = $_POST['rental'];
        $control->jenis_motor = $_POST['jenis_motor'];
    
        $control->cetakStruk();
        
    }
    ?>
</body>

</html>