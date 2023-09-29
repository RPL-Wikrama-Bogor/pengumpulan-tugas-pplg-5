<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental motor</title>
</head>
<body>
<div class="card">
    <center><h1>Rental Motor</h1></center>
    <center>
        <table>
            <form action="" method="post">
                <tr>
                    <td>Masukkan Nama peminjam :</td>
                    <td>
                        <input type="text" name="nama" autocomplete='off' required>
                    </td>
                </tr>
                <tr>
                    <td>masukkan lama waktu peminjman (per hari) :</td>
                    <td>
                        <input type="number" name="waktu" autocomplete='off' required>
                    </td>
                </tr>
                <tr>
                    <td>Pilih Tipe Bahan Bakar :</td>
                    <td>
                        <select name="jenis" required>
                            <option value="aerox">Aerox</option>
                            <option value="vario">vario</option>
                            <option value="beat">Beat</option>
                            <option value="vesmet">Vesmet</option>
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

<?php
include 'proses1.php';

$proses = new Beli();

if (isset($_POST['kirim'])) {
    $proses->setHarga(15420, 16130, 18310, 16510);

    $proses->nama = $_POST['nama'];
    $proses->jumlah = $_POST['waktu']; // Menggunakan 'waktu' yang sesuai dengan name di formulir
    $proses->jenis = $_POST['jenis'];

    $proses->hargaBeli();
    $proses->cetakPembelian();
}
?>

