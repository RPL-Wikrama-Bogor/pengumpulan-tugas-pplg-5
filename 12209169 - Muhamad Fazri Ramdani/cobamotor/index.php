<?php
include('coba.php');

// Create a new SEWA object and set motorcycle prices
$proses = new SEWA();
$proses->setHarga(15420, 16130, 18310, 16510);

if (isset($_POST['kirim'])) {
    // Get user input
    $proses->nama = $_POST['nama'];
    $proses->jumlah = $_POST['hari'];
    $proses->jenis = $_POST['jenis'];

    // Calculate total cost
    $totalCost = $proses->hargaSEWA();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyewaan Motor</title>
</head>
<body>
    <center>
        <h1>Penyewaan Motor</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Nama:</td>
                    <td>
                        <input type="text" name="nama" required>
                    </td>
                </tr>
                <tr>
                    <td>Berapa hari sewa motor:</td>
                    <td>
                        <input type="number" name="hari" required>
                    </td>
                </tr>
                <tr>
                    <td>Pilih Tipe Motor:</td>
                    <td>
                        <select name="jenis" required>
                            <option value="z1000">z1000</option>
                            <option value="zx25r">zx25r</option>
                            <option value="ducati">ducati</option>
                            <option value="h2">h2</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Sewa" name="kirim"></td>
                </tr>
            </table>
        </form>

        <?php
        // Display rental details if the form is submitted
        if (isset($_POST['kirim'])) {
            echo "<h2>Hasil Penyewaan</h2>";
            echo $proses->cetakPenyewaan();
        }
        ?>
    </center>
</body>
</html>
