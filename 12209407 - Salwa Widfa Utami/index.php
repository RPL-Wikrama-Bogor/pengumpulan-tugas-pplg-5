<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Rental Motor</title>
   <style>
    .tampil{
        text-align: center;
    }
   </style>
</head>
<body>
    
    <section class="tampil">
    <center>
    <form method="POST">
    <h2>Rental Motor</h2>
    <table>
        <tr>
            <td><label for="nama">Nama Pelanggan:</label></td>
            <td><input type="text" id="nama" name="nama" autocomplete='off'></td>
        </tr>
        <tr>
            <td><label for="lamaRental">Lama Rental (hari):</label></td>
            <td><input type="number" id="lamaRental" name="lamaRental" autocomplete='off'></td>
        </tr>
        <tr>
            <td><label for="jenisMotor">Jenis Motor:</label></td>
            <td>
            <select id="jenisMotor" name="jenisMotor" autocomplete='off'>
            <option value="Scoopy" >Scoopy</option>
            <option value="harley" >Harley</option>
            <option value="beat">Beat</option>
            </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="submit">Beli</button></td>
        </tr>
    </form>
    </table>
    </section>

    <?php
    require 'proses.php';
    $proses = new rental();
    $proses->setHarga(60000, 75000, 50000);


    if (isset($_POST['submit'])) {
    $proses->namaPelanggan = $_POST['nama'];
    $proses->waktuRental = $_POST['lamaRental'];
    $proses->motorYangDipilih = $_POST['jenisMotor'];

    $proses->totalHargaRental();
    $proses->hargaDiskon();
    $proses->cetakRental();
    }
    ?>
</body>
</html>