<?php
$furnitures = [
    [
        'nama' => 'Rak Piring 100cm X 200cm',
        'harga' => 300000,
        'tipe' => 'rakitan'
    ],
    [
        'nama' => 'Meja Belajar Classic',
        'harga' => 150000,
        'tipe' => 'non-rakitan'
    ],
    [
        'nama' => 'Kursi Taman 2 Seater',
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
    <title>Furnitures</title>
    <style>
        .card {
            background-color: slategrey;
            margin-bottom: 100px;
            border-style: solid;
            border-width: medium;
        }

        .card h1 {
            text-align: center;
        }

        .form {
            background-color: slategrey;
            margin-bottom: 100px;
            padding: 10px;
            border-style: solid;
            border-width: medium;
        }

        .bk {
            border-width: medium;
        }

    </style>
</head>
<body>
    <div class="card">
        <h1>Daftar Furnitures I'dea</h1>
        <ol>
            <?php foreach ($furnitures as $furniture) { ?>
                <li>Nama Furnitures: <?php echo $furniture["nama"]; ?><br>Harga: <?php 
                    echo $furniture["harga"]; ?> Tipe: <?php 
                    echo $furniture["tipe"]; ?></li>
            <?php } ?>
        </ol>
    </div>

    <div class="form">
    <form action="" method="post">
        Pilih Furnitures Rakitan: 
        <select name="namaRakitan">
            <?php foreach ($furnitures as $item) { 
                if ($item['tipe'] == 'rakitan') { ?>
                    <option value="<?php echo $item['nama']; ?>"><?php 
                    echo $item['nama']; ?></option>
                <?php } 
            } ?>
        </select><br>
        Jumlah Pembelian Furnitures Rakitan: <input type="number" name="jumlahRakitan" placeholder=""><br>
        Pilih Furnitures Tidak Rakitan: 
        <select name="namaNonRakitan">
            <?php foreach ($furnitures as $item) { 
                if ($item['tipe'] == 'non-rakitan') { ?>
                    <option value="<?php echo $item['nama']; ?>"><?php 
                    echo $item['nama']; ?></option>
                <?php } 
            } ?>
        </select><br>
        Jumlah Pembelian Furnitures Tidak Rakitan: <input type="number" name="jumlahNonRakitan" placeholder=""><br><br>
        <button type="submit" name="beli" style="width:100%;">Beli</button>
    </form>
</div>

<div class="card">     
<?php
if (isset($_POST['beli'])) {
    $namaRakitan = $_POST['namaRakitan'];
    $jumlahRakitan = $_POST['jumlahRakitan'];
    $namaNonRakitan = $_POST['namaNonRakitan'];
    $jumlahNonRakitan = $_POST['jumlahNonRakitan'];

    $totalHargaRakitan = 0;
    $totalHargaNonRakitan = 0;

    foreach ($furnitures as $item) {
        if ($item['nama'] == $namaRakitan) {    
            $totalHargaRakitan = $item['harga'] * $jumlahRakitan;
        } elseif ($item['nama'] == $namaNonRakitan) {
            $totalHargaNonRakitan = $item['harga'] * $jumlahNonRakitan;
        }
    }

    $totalHargaKeseluruhan = $totalHargaRakitan + $totalHargaNonRakitan;
    ?>

        <ol>
            <?php if ($jumlahRakitan > 0) { ?>
                <div class="bk">
                <h1>Bukti Pembelian</h1>
                <li>Nama Furnitures Rakitan: <?php echo $namaRakitan; ?><br>Jumlah: <?php 
                    echo $jumlahRakitan; ?><br>Total Harga: <?php 
                    echo $totalHargaRakitan; ?></li>
            <?php }?>

            <?php if ($jumlahNonRakitan > 0) { ?>
                <li>Nama Furnitures Tidak Rakitan: <?php echo $namaNonRakitan; ?><br>Jumlah: <?php 
                    echo $jumlahNonRakitan; ?><br>Total Harga: <?php 
                    echo $totalHargaNonRakitan; ?></li>
            <?php } else {
                echo "<center> Tidak Ada Pembelian </center>";
            }?>
            
            <li>Total Harga Keseluruhan: <?php echo $totalHargaKeseluruhan; ?></li>
        </ol>
    </div>
<?php } ?>
    </div>

</body>
</html>