<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>
<style>
    .tampil {
        border : 1px, solid, black;
    }
</style>
<body>
    <center>
        <h3><b>Rental Motor</b></h3>
        <table>
            <form action="" method="post">
                <tr>
                    <td>Nama Pelangan</td>
                    <td>
                        : <input type="text" name="namaP" required>
                    </td>
                </tr>
                <tr>
                    <td>Lama Waktu Rental (per hari)</td>
                    <td>
                        : <input type="number" name="jumlah" required>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Motor</td>
                    <td>
                        : <select name="jenis" required>
                            <option value="scooter">Scooter</option>
                            <option value="motocross">Motocross</option>
                            <option value="matic">Matic</option>
                            <option value="sportbike">Sportbike</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="kirim" name="submit"></td>
                </tr>
            </form>
        </table>
    </center>
<br> <br> 

<?php
include 'proses.php';
$proses = new beli();
$tampil = new beli();

$proses->setHarga(70000, 40000, 50000, 45000);
if(isset($_POST['submit'])){
    $proses->namaP = $_POST['namaP'];
    $proses->jumlah = $_POST['jumlah'];
    $proses->jenis = $_POST['jenis'];

    $proses->hargaBeli();
    $proses->cetakPembelian();
}
?>

</body>
</html>