<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Motor</title>

</head>
<body>
    <br><br>
    <center>
    <form action="" method="post" style="border: 2px solid #000; width: 600px; height: 300px; border-radius: 10px;">
    <br>
        <h1>Rental Motor Jaya Abadi</h1>
            <label for="nama">Masukkan Nama Anda: </label>
            <input type="text" name="nama" id="nama" autocomplete="off" required>
        <br><br>
            <label for="waktu">Lama Waktu Rental / <span style="font-style: italic;">Hari</span>: </label>
            <input type="number" min="0" name="waktu" id="waktu" required>
        <br><br>
            <label for="jenis">Jenis Motor: </label>
            <select name="jenis" require>
                <option hidden disabled selected>--Jenis Motor--</option>
                <option value="beat">Beat</option>
                <option value="vario">Vario</option>
                <option value="pcx">PCX</option>
            </select>
        <br><br><br>
            <button type="submit" name="sewa">Sewa Motor</button>
    </form>
    </center>

    <?php
    require 'controller.php';
    $logic = new Pembelian();
    $logic->setHarga(50000,60000,70000);
    if(isset($_POST['sewa'])) {
       if(isset($_POST["jenis"]) && is_string($_POST["jenis"])) {
            $logic->nama_pengguna = $_POST['nama'];
            $logic->lamaWaktu = $_POST['waktu'];
            $logic->jenisYangDipilih = $_POST['jenis'];

            $logic->cetakBukti(); 
       } else {
        echo "<p style='color: red; font-style: italic; text-align: center;'>Masukan jenis motor!</p>";
       }
    }
    ?>

</body>
</html>





