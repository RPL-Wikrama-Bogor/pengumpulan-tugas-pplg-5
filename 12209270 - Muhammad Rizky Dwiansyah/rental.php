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


$selectedRakitan = '';
$quantityRakitan = 0;
$selectedNonRakitan = '';
$quantityNonRakitan = 0;


$totalCost = 0;

if (isset($_POST['beli'])) {
    
    $selectedRakitan = $_POST['namaRakitan'];
    $quantityRakitan = ($_POST['jumlahRakitan']);
    $selectedNonRakitan = $_POST['namaNonRakitan'];
    $quantityNonRakitan = ($_POST['jumlahNonRakitan']);

    // Calculate total cost
    foreach ($furnitures as $item) {
        if ($item['nama'] === $selectedRakitan) {
            $totalCost += $item['harga'] * $quantityRakitan;
        } elseif ($item['nama'] === $selectedNonRakitan) {
            $totalCost += $item['harga'] * $quantityNonRakitan;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Store</title>
    <style>
        body {
            animation: changeColor 5s linear infinite;
        }

        .cd {
            margin-bottom: 70px;
            border-style: solid;
            border-width: medium;
        }

        .cd h2 {
            text-align: center;
        }

        @keyframes changeColor {
            0% {
                background-color: #3498db;
            }

            50% {
                background-color: #ba08c0;
            }

            100% {
                background-color: #6fa9df;
            }
        }
    </style>
</head>

<body>
    <div class="cd">
        <h2>~~~~ Furnitures ~~~~</h2>
        <ol>
            <?php foreach ($furnitures as $furniture) { ?>
                <li>Nama Furnitures: <?php echo $furniture["nama"]; ?><br>Harga: <?php echo $furniture["harga"]; ?> Tipe: <?php echo $furniture["tipe"]; ?></li>
            <?php } ?>
        </ol>
    </div>
    <div class="cd">
        <form action="" method="post">
            Pilih Furnitures Rakitan:
            <select name="namaRakitan">
            <option value="semua" disabled hidden selected>-------pilih-----</option>

                <?php foreach ($furnitures as $item) {
                    if ($item['tipe'] == 'rakitan') { ?>
                        <option value="<?php echo $item['nama']; ?>"><?php echo $item['nama']; ?></option>
                    <?php }
                } ?>
            </select><br>
            Jumlah Pembelian Furnitures Rakitan: <input type="number" name="jumlahRakitan" placeholder=""><br>
            Pilih Furnitures non Rakitan:
            <select name="namaNonRakitan">
            <option value="semua" disabled hidden selected>-------pilih-----</option>
                <?php foreach ($furnitures as $item) {
                    if ($item['tipe'] == 'non-rakitan') { ?>
                        <option value="<?php echo $item['nama']; ?>"><?php echo $item['nama']; ?></option>
                    <?php }
                } ?>
            </select><br>
            Jumlah Pembelian Furnitures non Rakitan: <input type="number" name="jumlahNonRakitan" placeholder=""><br>
            <button type="submit" name="beli">Beli</button>
        </form>
        <h2>Bukti pembayaran</h2>
        <?php if ($totalCost > 0) { ?>
            <p>Furnitures Rakitan: <?php echo $selectedRakitan; ?> (Jumlah: <?php echo $quantityRakitan; ?>)</p>
            <p>Furnitures non Rakitan: <?php echo $selectedNonRakitan; ?> (Jumlah: <?php echo $quantityNonRakitan; ?>)</p>
            <p>Total Biaya: <?php echo $totalCost; ?></p>
        <?php } ?>
    </div>
</body>

</html>
