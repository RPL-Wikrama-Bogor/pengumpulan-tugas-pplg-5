<?php
$furnitures = [
    [
        'nama' => 'Rak Piring 100cm X 200cm',
        'harga' => 300000,
        'tipe' => 'rakitan'
    ],
    [
        'nama' => 'Meja Belajar',
        'harga' => 150000,
        'tipe' => 'non-rakitan'
    ],
    [
        'nama' => 'Kursi Taman 2',
        'harga' => 270000,
        'tipe' => 'non-rakitan'
    ],
    [
        'nama' => 'Lemari Pajangan 5 susun',
        'harga' => 487000,
        'tipe' => 'rakitan'
    ],
    [
        'nama' => 'Meja Rias Tipe Europe',
        'harga' => 50000,
        'tipe' => 'non-rakitan'
    ],
    [
        'nama' => 'Ranjang Bayi',
        'harga' => 450000,
        'tipe' => 'rakitan'
    ]
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .daftar h2{
        text-align: center;
    }
    .card {
        border: 1px solid #000;
        background-color: white;
        width: 600px; 
        margin: 0 auto;
        padding : 20px 30px 30px 50px;
        margin-bottom: 20px;
    }
    .card button {
        width: 600px;
        text-align: center;
    }
    .card h2 {
        color: #333;
        text-align : center;
    }
    .card h3 {
        text-align: center;
    }
</style>
<body>
    <div class="daftar">
    <div class="card">
        <h2>Daftar Furniture I'dea</h2><br>
        <ol>
        <?php 
        foreach ($furnitures as $key=>$value){ ?>
            <li style="font-size: 18px;">Nama Furniture : <?= $value['nama']?>
                <br> Harga : <?= $value['harga']?></li>
        <?php } ?>
        </ol>
    </div>
    </div>
    <div class="pesan">
    <div class="card">
    <form action="" method = "post">
        <label>Pilih Furniture Rakitan</label>
        <select name="rakitan">
            <option disabled hidden selected>---Pilih---</option>
            <?php
            foreach ($furnitures as $key2 => $item2) {
                if ($item2['tipe'] == "rakitan") {
                    ?>
                    <option value="<?= $key2 ?>"><?= $item2['nama'] ?></option>
                    <?php
                }
            }  ?>
        </select>
        <br><br>
        <label>Jumlah Pembelian Furniture Rakitan</label>
        <input type="number" name="jumlahR"><br><br>
        <label>Pilih Furniture Rakitan</label>
        <select name="nonRakitan">
            <option disabled hidden selected>---Pilih---</option>
            <?php
            foreach ($furnitures as $key => $item) {
                if ($item['tipe'] == "non-rakitan") {
                    ?>
                    <option value="<?= $key ?>"><?= $item['nama'] ?></option>
                    <?php
                }
            }  ?>
        </select> <br><br>
            <label>Jumlah Pembelian Furniture Tidak Rakitan</label>
            <input type="number" name="jumlahTr"><br><br>
        <button type="submit" name="beli">beli</button>
    </form>
    </div>
    </div>
    <?php
    if (isset($_POST['beli'])) {
        $jumlahR = $_POST['jumlahR'];
        $jumlahTr = $_POST['jumlahTr'];
        $indexR = $_POST['rakitan'];
        $indexNr = $_POST['nonRakitan'];
        $hargaR = $furnitures[$indexR]['harga'];
        $hargaNr = $furnitures[$indexNr]['harga'];
        $namaR = $furnitures[$indexR]['nama'];
        $namaNr = $furnitures[$indexNr]['nama'];
        // $hargaNr = $_POST['nonRakitan'];
        $totalHargaR = $jumlahR * $hargaR;
        $totalHargaNr = $jumlahTr * $hargaNr; 
        $total = $totalHargaR + $totalHargaNr
    ?>
    <div class= "bukti">
    <div class="card">
        <h3>Bukti Pembelian</h3>
        <p>Furniture Rakitan : <?=  $namaR ?> (<?=$jumlahR?>) </p> 
        <p>Harga Furniture Rakitan : Rp. <?= number_format($totalHargaR, 2, ',', '.') ?> </p> 
        <p>Furniture Non Rakitan : <?=  $namaNr ?> (<?=$jumlahTr?>) </p> 
        <p>Harga Furniture Non Rakitan : Rp. <?= number_format($totalHargaNr, 2, ',', '.') ?>  </p> 
        <p>Jumlah Pembayaran : <b>Rp. <?= number_format($total, 2, ',', '.') ?> </b></p> 
    </div>
    </div>
    <?php
    } ?>
</body>
</html>