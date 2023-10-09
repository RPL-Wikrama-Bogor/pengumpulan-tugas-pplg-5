<?php
include 'tugas2.php';

?>

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
        <h2>Form Rental Motor</h2>
        <form action="" method="post">
            <table>
                <tr>
                    <td><label for="nama">Nama Pelanggan</label></td>
                    <td> : <input type="text" name="nama" required></td>
                </tr>
                <tr>
                    <td><label for="waktu">Lama Waktu Rental (per hari)</label></td>
                    <td> : <input type="number" name="waktu" required></td>
                </tr>
                <tr>
                    <td><label for="motor">Jenis Motor</label></td>
                    <td>
                        : <select name="motor" required>
                            <option disabled hidden selected>---Pilih---</option>
                            <option value="Matic">Matic</option>
                            <option value="Scooter">Scooter</option>
                            <option value="Cross">Cross</option>
                            <option value="SportBike">SportBike</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-left : 205px;">
                        <input type="submit" value="Submit" name="submit">
                    </td>
                </tr>
            </table>
        </form>
    </center>
    <div class="card">
    <?php
    $proses = new Beli();
    $proses->setHarga(85000, 70000, 80000, 150000);
    if (isset($_POST['submit'])) {
        $proses->nama = $_POST['nama'];
        $proses->motor = $_POST['motor'];
        $proses->waktu = $_POST['waktu'];

        $proses->hargaBeli();
        $proses->cetakPembelian();
    
    ?>
    <style>
        .card {
            border: 1px solid #000;
            background-color: white;
            width: 350px; 
            margin: 0 auto;
            padding : 20px;
            margin-bottom: 20px;
        }
    </style>
    
        
    </div>

<?php
} // Akhir dari kondisi
?>

    
</body>
</html>

