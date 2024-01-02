<?php
require 'array.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Array</title>
    <style>
        .daftar-barang {
            border: 2px solid black;
            padding: 3px;
        }

        h1 {
            margin-left: 40px;
        }

        ol li {
            padding: 5px;
            margin-left: 50px;
            font-size: 17px;
        }

        .form-input {
            border: 2px solid black;
            margin-top: 15px;
            padding: 5px;
        }

        .inputan {
            padding: 7px;
        }
    </style>
</head>

<body>
    <div class="daftar-barang">
        <h1>Daftar barang Ikea</h1>
        <ol>
            <?php foreach ($furnitures as $furniture) : ?>
                <li>Nama Furniture: <?= $furniture['nama']; ?><br> Harga: Rp. <?= number_format($furniture['harga'], 2, ',', '.'); ?></li>
            <?php endforeach ?>
        </ol>
    </div>
    <form action="" method="post">
        <div class="form-input">
            <div class="inputan">
                <!-- rakitan -->
                <label for="rakitan">Pilih Furniture Rakitan: </label>
                <select name="rakitan" id="rakitan">
                    <option hidden selected value="">- - Rakitan - -</option>
                    <?php foreach ($furnitures as $furniture => $index) : ?>
                        <?php if ($index['tipe'] == 'rakitan') : ?>
                            <option value="<?= $furniture; ?>"><?= $index['nama']; ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select><br>

                <!-- jumlah pembelian rakitan -->
                <label for="jumlah-barang">Jumlah Pembelian Furniture Rakitan: </label>
                <input type="number" name="jumlah_rakitan" id="jumlah-barang" required><br>

                <!-- non-rakitan -->
                <label for="non-rakitan">Pilih Furniture Rakitan: </label>
                <select name="nonRakitan" id="non-rakitan">
                    <option hidden selected value="">- - NON - Rakitan - -</option>
                    <?php foreach ($furnitures as $furniture => $index) : ?>
                        <?php if ($index['tipe'] == 'non-rakitan') : ?>
                            <option value="<?= $furniture; ?>"><?= $index['nama']; ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select><br>

                <!-- jumlah pembelian non-rakitan -->
                <label for="jumlah-barang-non"> Jumlah Pembelian Furniture Tidak Rakitan: </label>
                <input type="number" name="jumlah_nonRakitan" id="jumlah-barang-non" required><br>

                <!-- submit -->
                <button type="submit" name="beli">Beli</button>
            </div>
        </div>

        <div class="struk-pembelian">
            <?php
        
            if (isset($_POST['beli'])) {
                $rakitan = $_POST['rakitan'];
                $non_rakitan = $_POST['nonRakitan'];

                if ($rakitan == '' || $non_rakitan == '') {
                    echo "<p style='color: red; font-size: 20px;'> Harus Pilih Furniture Terlebih Dahulu</p>";
                } else {

                    $jumlahPembelianRakitan = $_POST['jumlah_rakitan'];
                    $jumlahPembelianNonRakitan = $_POST['jumlah_nonRakitan'];

                    $nameRakitan = $furnitures[$rakitan]['nama'];
                    $nameNonRakitan = $furnitures[$non_rakitan]['nama'];

                    $hargaRakitan = $furnitures[$rakitan]['harga'];
                    $hargaTotalRakitan = $hargaRakitan * $jumlahPembelianRakitan;

                    $hargaNonRakitan = $furnitures[$non_rakitan]['harga'];
                    $hargaTotalNonRakitan = $hargaNonRakitan * $jumlahPembelianNonRakitan;

                    $totalPembayaran = $hargaTotalRakitan + $hargaTotalNonRakitan;


                    echo "<h1> Bukti Pembelian </h1>";
                    echo "Furniture Rakitan : " . $nameRakitan . " (" . $jumlahPembelianRakitan . ") <br>";
                    echo "harga Furniture Rakitan : Rp. " . number_format($hargaTotalRakitan, 2, ',', '.') . "<br>";
                    echo "Furniture Non-Rakitan: " . $nameNonRakitan . " (" . $jumlahPembelianNonRakitan . ") <br>";
                    echo "Harga Furniture Non-Rakitan : Rp. " . number_format($hargaTotalNonRakitan, 2, ',', '.') . "<br>";
                    echo "Total Pembayaran : <b>Rp. " . number_format($totalPembayaran, 2, ",", '.') . "</b>";
                }
            }
            ?>
        </div>
    </form>
</body>

</html>