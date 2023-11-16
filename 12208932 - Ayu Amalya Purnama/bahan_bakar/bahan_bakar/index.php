<?php
include 'proses.php';
$proses = new Beli();
$proses->setHarga(15420, 16130, 18310, 16510);
if (isset($_POST['kirim'])) {
    $proses->jumlah = $_POST['liter'];
    $proses->jenis = $_POST['jenis'];

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
    <title>Bahan Bakar Shell</title>
</head>
<body>
    <center>
        <table>
            <form action="" method="post">
                <tr>
                    <td>Masukkan Jumlah Liter :</td>
                    <td>
                        <input type="number" name="liter" required>
                    </td>
                </tr>
                <tr>
                    <td>Pilih Tipe Bahan Bakar :</td>
                    <td>
                        <select name="jenis" required>
                            <option value="SSuper">Shell Super</option>
                            <option value="SVPower">Shell V-Power</option>
                            <option value="SVPowerDiesel">Shell V-Power Diesel</option>
                            <option value="SVPowerNitro">Shell V-Power Nitro</option>
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