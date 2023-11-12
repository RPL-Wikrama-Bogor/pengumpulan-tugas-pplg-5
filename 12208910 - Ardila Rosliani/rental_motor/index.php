<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>
<body>
    <center>
        <h1>Rental Motor</h1>
        <table>
            <form action="" method="post">
                <tr>
                    <td>Nama Pelanggan</td>
                    <td>
                        <input type="text" name="nama" required>
                    </td>
                </tr>
                <tr>
                    <td>Lama Waktu Rental (per hari)</td>
                    <td>
                        <input type="number" name="waktu" required>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Motor </td>
                    <td>
                        <select name="jenis" required>
                            <option>Honda</option>
                            <option>Yamaha</option>
                            <option>Kawasaki</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><input type="submit" value="Submit" name="kirim"></td>
                </tr>
            </form>
        </table>
    </center>
</body>
</html>

<?php
include 'proses.php';
$proses = new Beli();
$proses->setHarga(70000, 80000, 90000);
if (isset($_POST['kirim'])) {
    $proses->nama = $_POST['nama'];
    $proses->jenis = $_POST['jenis'];
    $proses->waktu = $_POST['waktu'];

    $proses->hargaBeli();
    $proses->Member();
    $proses->cetakPembelian();
}
?>
