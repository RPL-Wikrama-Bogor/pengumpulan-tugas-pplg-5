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
    <title>Furniturer</title>
</head>
<style>
    .all {
        display: grid;
        place-items: center;
    }

    .daftar {
        display: grid;
        place-items: center;
        border: 1px solid black;
        padding: 2% 35% 2%;
    }
</style>

<body>
    <div class="all">
        <div class="daftar">
            <div class="daftar-list">
                <h2>Daftar Furniture Sufyan</h2>
                <ol>
                    <?php foreach ($furnitures as $furnitur) : ?>
                        <li>Nama Furniture: <?= $furnitur['nama'] ?><br> Harga: <?= $furnitur['harga'] ?></li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
        <br><br>
        <div class="daftar">
            <div class="daftar-list">
                <form action="" method="post">
                    <!-- pilih rakitan  -->
                    <p>Pilih Furniture Rakitan :</p>
                    <select name="namarakitan" id="" required='0'>
                        <option disabled hidden selected>---Pilih---</option>
                        <?php foreach ($furnitures as $key => $item) : ?>
                            <?php if ($item['tipe'] === 'rakitan') : ?>
                                <option value="<?= $key; ?>"><?= $item['nama']; ?></option>
                            <?php endif; ?>
                        <?php endforeach ?>
                    </select>
                    <!-- input jumlah rakitan  -->
                    <p>Jumlah Pembelian Furniture Rakitan :</p>
                    <input type="number" name="jumlahrakitan" id="">

                    <!-- pilih non-rakitan  -->
                    <p>Pilih Furniture Tidak Rakitan :</p>
                    <select name="namanonrakitan" id="" required='0'>
                        <option disabled hidden selected>---Pilih---</option>
                        <?php foreach ($furnitures as $key => $item) : ?>
                            <?php if ($item['tipe'] === 'non-rakitan') : ?>
                                <option value="<?= $key; ?>"><?= $item['nama']; ?></option>
                            <?php endif; ?>
                        <?php endforeach ?>
                    </select>
                    <!-- input jumlah non-rakitan  -->
                    <p>Jumlah Pembelian Furniture Non-Rakitan :</p>
                    <input type="number" name="jumlahnonrakitan" id="">
                    <br><br>
                    <button type="submit" name="beli">Beli Sekarang</button>
                </form>
            </div>
        </div>

        <?php
        // variabel dengan value kosong
        $rakitan = '';
        $jmlRakitan = 0;
        $nonRakitan = '';
        $jmlNonRakitan = 0;
        $hargaRakitan = 0;
        $hargaNonRakitan = 0;

        if (isset($_POST['beli'])) {
            if (isset($_POST['namarakitan'])) {
                $rakitanIndex = $_POST['namarakitan'];
                $jmlRakitan = $_POST['jumlahrakitan'];

                // mengambil value yg dipilih di option
                $rakitan = $furnitures[$rakitanIndex]['nama'];
            }
        } else {
        }
        if (isset($_POST['namanonrakitan'])) {
            $nonRakitanIndex = $_POST['namanonrakitan'];
            $jmlNonRakitan = $_POST['jumlahnonrakitan'];

            // mengambil value yg dipilih di option
            $nonRakitan = $furnitures[$nonRakitanIndex]['nama'];
        } else {
        }
        ?>
        <br><br>
        <div class="daftar">
            <div class="daftar-list">
                <h2>Bukti Pembayaran</h2>
                <!-- output rakitan -->
                <?php if ($jmlRakitan > 0) : ?>
                    <p>Furniture Rakitan : <?= $rakitan; ?> ( <?= $jmlRakitan; ?> ) </p>
                    <?php
                    $hargaRakitan = $jmlRakitan * $furnitures[$rakitanIndex]['harga'];
                    ?>
                    <p>Harga Furnitur Rakitan : <?= number_format($hargaRakitan, 0, ',', '.'); ?></p>
                <?php endif; ?>

                <!-- output nonrakitan -->
                <?php if ($jmlNonRakitan > 0) : ?>
                    <p>Furniture Non Rakitan : <?= $nonRakitan; ?> ( <?= $jmlNonRakitan; ?> )</p>
                    <?php
                    $hargaNonRakitan = $jmlNonRakitan * $furnitures[$nonRakitanIndex]['harga'];
                    ?>
                    <p>Harga Fur niture Non Rakitan : <?= number_format($hargaNonRakitan, 0, ',', '.'); ?></p>
                <?php endif; ?>
                <!-- output keseluruhan -->
                <?php $jumlahKseluruhanHarga = $hargaRakitan + $hargaNonRakitan; ?>
                <p>Total Pembayaran : <b> <?= number_format($jumlahKseluruhanHarga, 0, ',', '.'); ?> </b> </p>
            </div>
        </div>
    </div>
</body>

</html>