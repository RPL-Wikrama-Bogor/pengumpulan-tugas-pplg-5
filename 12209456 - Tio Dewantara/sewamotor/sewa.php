<!-- Jadi, kode ini digunakan untuk mengelola pembelian 
barang dengan mengambil input dari formulir HTML yang dikirimkan melalui metode POST
 mengatur harga barang, dan kemudian menghitung dan mencetak detail pembelian.
 -->
<?php
include 'proces.php';
$proses = new Beli();
$proses->setHarga(50000, 45000, 55000, 65000, 700000 );
if (isset($_POST['kirim'])) {
    $proses->hari = $_POST['hari'];
    $proses->jenis = $_POST['jenis'];
    $proses->nama = $_POST['nama'];
//menghitung harga beli berdasarkan data yg telah di masukan sebelumnya
    $proses->hargaBeli();
    $proses->cetakPembelian();
}
?>

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
        <table>
            <form action="" method="post">
                <tr>
                    <td>Masukkan nama</td>
                    <td>
                        <input type="text" name="nama" required>
                    </td>
                </tr>
                <tr>
                    <td>Waktu rental(perhari)</td>
                    <td>
                        <input type="number" name="hari" required>
                    </td>
                </tr>
                <tr>
                    <td>Pilih Motor</td>
                    <td>
                        <select name="jenis" required>
                            <option value="aerox">aerox</option>
                            <option value="scoopy">Scoopy</option>
                            <option value="vario">vario</option>
                            <option value="pcx">pcx</option>
                            <option value="beat">beat</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Beli" name="kirim"></td>
                </tr>
            </form>
        </table>
    </center>

</body>
</html>
