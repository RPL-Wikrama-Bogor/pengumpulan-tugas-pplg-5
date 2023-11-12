<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Motor</title>

</head>
<body>
<center>
    <form action="" method="post" style="border: 3px solid #000000; width: 700px; height: 150px; border-radius: 15px;">
<table>
            <tr>
                <td><br>
                    <div  >
                    <label for="nama">Masukkan Nama Anda:</label>
                    <input type="text" name="nama" id="nama" autocomplete="off" autofocus>
                </td>
            </tr>
        </div>
        <tr>
            <td>
                <div  >
                <label for="waktu">Lama Waktu Rental(per Hari):</label>
                <input type="number" min="1" name="waktu" id="waktu">
            </div>
        </td>
    </tr>
        <tr>
           <td>
                <div  >
                <label for="jenis">Jenis Motor:</label>
                <select name="jenis" require>
                    <option hidden disabled selected>Pilih Jenis Motor</option>
                    <option value="Scooter">Scooter</option>
                    <option value="Aerox">Aerox</option>
                    <option value="Vario">Vario</option>
                </select>
            </div>
        <tr>
            <td>
                <tr>
                    <td>
            <button type="submit" name="sewa">Sewa Motor</button>
            </td>
        </tr>
    </form>
</table>

    <?php
    require 'controller.php';
    $logic = new Pembelian();
    $logic->setHarga(70000,85000,82000);
    if(isset($_POST['sewa'])) {
        if(isset($_POST['jenis'])) {
        $logic->nama_pengguna = $_POST['nama'];
        $logic->lamaWaktu = $_POST['waktu'];
        $logic->jenisYangDipilih = $_POST['jenis'];

        $logic->cetakBukti();

    }else {
        echo '<p style="color : red; font-style: italic; margin-top: 10px;">Inputan yang dimkasukan salah / kosong</p>';
    }
    }
    ?>

</center>
</body>
</html>