<?php

$furnitures = [
    [
        'nama' => 'Rak Piring 100cm X 200cm',
        'harga' => 300000,
        'tipe' => 'Rakitan'
    ],
    [
        'nama' => 'Meja Belajar Classic',
        'harga' => 150000,
        'tipe' => 'Non-rakitan'
    ],
    [
        'nama' => 'Kursi Taman 2 Seater',
        'harga' => 270000,
        'tipe' => 'Non-rakitan'
    ],
    [
        'nama' => 'Lemari Pajangan 5 Susun',
        'harga' => 487000,
        'tipe' => 'Rakitan'
    ],
    [
        'nama' => 'Meja Rias Tipe Europe',
        'harga' => 50000,
        'tipe' => 'Non-rakitan'
    ],
    [
        'nama' => 'Ranjang Bayi',
        'harga' => 450000,
        'tipe' => 'Rakitan'
    ]
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membeli Furniture</title>
</head>
<body>
<style>
        .card {
            border: 1px solid #000;
            background-color: white;
            width: 500px; 
            margin: 0 auto;
            padding : 20px 30px 30px 50px;
            margin-bottom: 20px;
        }

        .card h2 {
            text-align : center;
        }

        button {
            width : 100%;
        }

        </style>
    <div class="card">
    <h2>Daftar Furniture I'dea</h2>
    <ol>
        <?php
        foreach($furnitures as $key=>$furniture):
            echo "<li> Nama Furniture : ". $furniture['nama'] . "<br>" . "Harga : " . $furniture['harga'] . "<br></li>" ; 
            endforeach; ?>
            </ol>
    </div>
    
    <div class="card">
    <form action="" method="post">
        <label for="fur_rakit">Pilih Furniture Rakitan : </label>
        <select name="fur_rakit">
            <option disable hidden selected>---Pilih---</option>
            <?php
            foreach ($furnitures as $key => $item) {
                if($item['tipe'] == 'Rakitan') {
                ?>
                <option value="<?= $key ?>"><?= $item['nama'] ?></option>
                <?php
                }
            }
            ?>
        </select>
        <br><br>
        <label for="jumlah_rakit">Jumlah Pembelian Furniture Rakitan : </label>
        <input type="number" name="jumlah_rakit" placeholder="Masukkan Jumlah...">
        <br><br>
        <label for="fur_non">Pilih Furniture Tidak Rakitan : </label>
            <select name="fur_non">
                <option disable hidden selected>---Pilih---</option>
                <?php
                foreach ($furnitures as $key => $item) {
                    if($item['tipe'] == 'Non-rakitan') {
                    ?>
                    <option value="<?= $key ?>"><?= $item['nama'] ?></option><br>
                    <?php
                }
            }
            ?>
            </select>
        <br><br>
        <label for="jumlah_non">Jumlah Pembelian Furniture Tidak Rakitan : </label>
        <input type="number" name="jumlah_non" placeholder="Masukkan Jumlah...">
        <br><br>
        <button type="submit" name="beli">Beli</button>
    </form>
    </div>

    
    <?php

    if(isset($_POST['beli'])) {

        $jumlah_rakit = $_POST['jumlah_rakit'];
        $jumlah_non = $_POST['jumlah_non'];
        $rakit = $_POST['fur_rakit'];
        $non_rakit = $_POST['fur_non'];
        $nm_rakit = $furnitures[$rakit]['nama'];
        $nm_non = $furnitures[$non_rakit]['nama'];
        $harga_rakit = $furnitures[$rakit]['harga'];
        $harga_non = $furnitures[$non_rakit]['harga'];
        $totalHargaR = $jumlah_rakit * $harga_rakit;
        $totalHargaNr = $jumlah_non * $harga_non; 
        ?>
        <div class="card">
        <h2>Bukti Pembelian</h2>
        <p>Furniture Rakitan : <?= $nm_rakit . "($jumlah_rakit)"?> </p> 
        <p>Harga Furniture Rakitan : <?= "Rp." . number_format($harga_rakit, 2, ',', '.')  ?> </p> 
        <p>Furniture Non Rakitan : <?= $nm_non . "($jumlah_non)" ?> </p> 
        <p>Harga Furniture Non Rakitan : <?= "Rp." . number_format($harga_non, 2, ',', '.') ?> </p> 
        <p>Total Pembayaran : <?= "<b>Rp." . number_format($total = $totalHargaR + $totalHargaNr, 2, ',', '.')  . "</b>" ?> </p> 
    </div>
    <?php  
    }?>
</body>
</html>