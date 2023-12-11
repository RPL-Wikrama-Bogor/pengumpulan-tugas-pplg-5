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
    <title>Soal Array Furnitures</title>
    <style>
        h2{
            text-align: center;
        }
        .daftar{
            border: 2px solid black;
            padding: 10px;
            margin: 20px 80px;
        }
    </style>
</head>
<body>
    <div class= "daftar">
        <h2>Daftar Furniture I'dea</h2>
        <ol>
            <?php foreach( $furnitures as $isi ){ ?>
            <li>Nama Furniture : <?php echo $isi["nama"] ?> <br> Harga : <?php echo $isi["harga"] ?></li>
            <?php }?>
        </ol>
    </div>

    <div class= "daftar">
        <form action="" method="post">
            <label for="">Pilih Furniture Rakitan </label>
            <select name="rakitan" id="">
            <option disable hidden selected> ---Pilih---</option>
            <?php
            foreach ($furnitures as $key => $item) {
                if ($item['tipe'] == 'rakitan') {
            ?>

                <option value="<?= $key ?>"><?= $item['nama']?></option>
            <?php
                }
            }
            ?>
            </select>
            <br>

            <label for="">Jumlah Pembelian Furniture Rakitan</label>
            <input type="number" name="jmlhRakitan">
            <br>
            
            <label for="">Pilih Furniture Tidak Rakitan </label>
            <select name="nonRakitan" id="">
            <option disable hidden selected> ---Pilih---</option>
            <?php
            foreach ($furnitures as $key => $item) {
                if ($item['tipe'] == 'non-rakitan') {
            ?>

                <option value="<?= $key ?>"><?= $item['nama']?></option>
            <?php
                }
            }
            ?>
            </select>
            <br>

            <label for="">Jumlah Pembelian Furniture Tidak Rakitan </label>
            <input type="number" name="jmlhNonRakitan">
            <br>

            <button type="submit" name="submit">Beli</button>
        </form>
    </div>

    <?php
    if (isset($_POST["submit"])) {
        $jmlhRakitan = $_POST['jmlhRakitan'];
        $jmlhNonRakitan = $_POST['jmlhNonRakitan'];
        $rakitanId = $_POST['rakitan'];
        $nonRakitanId = $_POST['nonRakitan'];

        $rakitan = $furnitures[$rakitanId] ['nama'];
        $nonRakitan = $furnitures[$nonRakitanId] ['nama'];
        $hargaRakitan = $furnitures[$rakitanId] ['harga'];
        $hargaNonRakitan = $furnitures[$nonRakitanId] ['harga'];

        $hargaRakitan = $hargaRakitan * $jmlhRakitan;
        $hargaNonRakitan = $hargaNonRakitan * $jmlhNonRakitan;
        $total = $hargaRakitan + $hargaNonRakitan;

    ?>
        <div class="daftar">
        <h2>Bukti Pembelian</h2>
        <p><?php echo "Furniture Rakitan :" . $rakitan . " (" . $jmlhRakitan . ")"?></p>
        <p><?php echo "Harga Furniture Rakitan : Rp " . number_format($hargaRakitan, 0, ",", ".")?></p>
        <p><?php echo "Furniture Non Rakitan :" . $nonRakitan . " (" . $jmlhNonRakitan . ")"?></p>
        <p><?php echo "Harga Furniture Non Rakitan : Rp " . number_format($hargaNonRakitan,0, ",", ".")?></p>
        <p><?php echo "Total Pembayaran : Rp " . number_format($total,0, ",", ".")?></p>
        </div>

    <?php
    }
    ?> 
</body>
</html>