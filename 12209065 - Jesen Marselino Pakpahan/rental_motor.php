<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental</title>
</head>

<body>
    <center>
        <table class="mt-5">
            <form action="" method="post">
                <tr>
                    <td>Masukkan nama</td>
                    <td>
                        <input type="text" name="nama" class="input form-control">
                    </td>
                </tr>
                <tr>
                    <td>Waktu rental(perhari)</td>
                    <td>
                        <input type="number" name="hari" class="input form-control">
                    </td>
                </tr>
                <tr>
                    <td>Pilih Motor</td>
                    <td>
                        <select name="jenis" required class="input form-control">
                            <option value="beat">Beat</option>
                            <option value="scoopy">Scoopy</option>
                            <option value="vario">vario</option>
                            <option value="klx">klx</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Beli" name="kirim" class="btn btn-success"></td>
                </tr>
            </form>
        </table>
    </center>
</body>


</html>

<?php
include 'proses_rental.php';
$proses = new nyewa();
$proses->setHarga(50000, 70000, 80000, 100000);
if (isset($_POST['kirim'])) {
    $proses->hari = $_POST['hari'];
    $proses->jenis = $_POST['jenis'];
    $proses->nama = $_POST['nama'];

    $proses->hargaBeli();
    $proses->cetakPembelian();
}
?>