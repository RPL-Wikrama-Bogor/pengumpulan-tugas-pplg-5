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
        <h1>Juragan Rental</h1>
        <table>
            <form action="" method="post">
                <tr>
                    <td>Masukkan Nama :</td>
                    <td>
                        <input type="varchar" name="nama" placeholder="Nama" autocomplete="off" required>
                    </td>
                    
                  
                </tr>
                <tr>
                <td>Lama waktu rental(per hari) :</td>
                    <td>
                        <input type="varchar" name="waktu" placeholder="Waktu peminjaman" autocomplete="off" required>
                    </td>
                </tr>
                <tr>
                    <td>Pilih Tipe Motor:</td>
                    <td>
                        <select name="jenis" required>
                            <option value="R1">R1M</option>
                            <option value="XSR900">XSR900</option>
                            <option value="ZX25RR">ZX250RR</option>
                            <option value="R6">R6</option>
                            <option value="H2R">H2R</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    
                    <div class="kirim">
                    <td colspan="2"><input type="submit" value="submit" name="kirim"></td>
                    </div>
                </tr>
            </form>
        </table>
    </center>

    
<?php
include 'proses.php';
$proses = new Rental();
$proses->setHarga(100000, 200000, 300000, 400000, 500000);

if (isset($_POST['kirim'])) {
    $proses->nama = $_POST['nama'];
    $proses->hari = $_POST['waktu'];
    $proses->jenis = $_POST['jenis'];
    $proses->cetakPeminjaman();
}
?>
</body>
</html>