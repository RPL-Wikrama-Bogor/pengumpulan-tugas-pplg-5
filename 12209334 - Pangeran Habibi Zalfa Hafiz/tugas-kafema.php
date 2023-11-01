<?php
$furnitures = [
    [
        'nama' => 'Rak Piring 100cm x 200cm',
        'harga' => 300000,
        'tipe' => 'rakitan',
    ],
    [
        'nama' => 'Meja Belajar Clasic',
        'harga' => 150000,
        'tipe' => 'non-rakitan',
    ],
    [
        'nama' => 'Kursi Taman 2 Seater',
        'harga' => 270000,
        'tipe' => 'non-rakitan',
    ],
    [
        'nama' => 'Lemari panjangan 5 susun',
        'harga' => 487000,
        'tipe' => 'rakitan',
    ],
    [
        'nama' => 'Meja rias tipe Europe',
        'harga' => 50000,
        'tipe' => 'non-rakitan',
    ],
    [
        'nama' => 'Ranjang bayi',
        'harga' => 300000,
        'tipe' => 'rakitan',
    ],
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylekafema.css">
    <title>Tugas Array</title>
</head>
<body>
    <div class="furnitur">
        <h2>Daftar Furniture</h2>
        <ol>
            <?php
            foreach ($furnitures as $furniture) {
                echo  "<li>" . 'Nama Furniture :'  . ' ' . $furniture["nama"] . "<br>". ' Rp ' . number_format($furniture["harga"], 0,',','.') . '  ' . '</li>';
            }
            ?>
        </ol>
    </div>
    <br>
    <div class="form-inputan">
        <!-- Input untuk furniture rakitan -->
        <form action="" method="post">
            <p>Pilih Furniture Rakitan:</p>
            <select name="namarakitan" id="">
                <option disabled hidden selected>---Pilih---</option>
                <?php foreach ($furnitures as $key => $item):?>
                    <?php if($item['tipe'] === 'rakitan'):?>
                        <option value="<?= $key; ?>"><?= $item['nama'];?></option>
                    <?php endif;?>
                <?php endforeach;?>
            </select>
            <p>Jumlah Pembelian Furniture Rakitan :</p>
            <input type="number" name="jumlahrakitan" id="">

            <!-- Input untuk furniture non-rakitan -->
            <p>Pilih Furniture Non-Rakitan:</p>
            <select name="namanonrakitan" id="">
                <option disabled hidden selected>---Pilih---</option>
                <?php foreach ($furnitures as $key => $item) : ?>
                    <?php if ($item['tipe'] === 'non-rakitan') : ?>
                        <option value="<?= $key; ?>"><?= $item['nama']; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <p>Jumlah Pembelian Furniture Non-Rakitan :</p>
            <input type="number" name="jumlahnonrakitan" id="">
            <button type="submit" name="beli">Beli Sekarang</button>
        </form>
        <br>
        </div>
        <br>
        <div class="card-output">
            <?php
        $rakitan = '';
        $jumlahRakitan = 0;
        $nonRakitan = '';
        $jumlahNonRakitan = 0;
        $hargaRakitan = 0;
        $hargaNonRakitan = 0;
        
        if (isset($_POST['beli'])) {
            $rakitanIndex = $_POST['namarakitan'];
            $jumlahRakitan = $_POST['jumlahrakitan'];
            $nonRakitanIndex = $_POST['namanonrakitan'];
            $jumlahNonRakitan = $_POST['jumlahnonrakitan'];
            
            // Mengambil value option
            $rakitan = $furnitures[$rakitanIndex]['nama'];
            $nonRakitan = $furnitures[$nonRakitanIndex]['nama'];
        }
        ?>
        <!-- Output Rakitan -->
        <?php if ($jumlahRakitan > 0) : ?>
            <p>Furniture Rakitan : <?= $rakitan; ?> ( <?= $jumlahRakitan; ?> ) </p>
            <?php
            $hargaRakitan = $jumlahRakitan * $furnitures[$rakitanIndex]['harga'];
            ?>
            <p>Harga Furnitur Rakitan : Rp <?= number_format($hargaRakitan, 0, ',', '.'); ?></p>
            <?php endif; ?>
            
            <!-- Output Non-Rakitan -->
            <?php if ($jumlahNonRakitan > 0) : ?>
                <p>Furniture Non Rakitan : <?= $nonRakitan; ?> (<?= $jumlahNonRakitan; ?> )</p>
                <?php 
            $hargaNonRakitan = $jumlahNonRakitan * $furnitures[$nonRakitanIndex]['harga'];
            ?>
            <p>Total Furniture Non Rakitan : Rp <?= number_format($hargaNonRakitan, 0, ',', '.'); ?></p>
            <?php endif; ?>
            
            <!-- Total Pembayaran -->
            <?php if ($hargaRakitan > 0 && $hargaNonRakitan > 0) : ?>
                <?php $jumlahKeseluruhan = $hargaRakitan + $hargaNonRakitan; ?>
                <p>Total Pembayaran : Rp <?= number_format($jumlahKeseluruhan, 0, ',', '.'); ?></p>
                <?php endif; ?>
            </div>
    </body>
</html>
            