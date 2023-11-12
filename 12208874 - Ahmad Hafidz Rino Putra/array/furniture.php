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
]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Furnitur</title>
    <style>

        
        
        .card {
            padding: 10px;
            margin-top: 20px;
            margin-left: 280px;
            width: 70rem;
            height: 40rem;
            float: left;
            border: 2px solid black;
        }

        .card2 {
            padding: 10px;
            margin-top: 20px;
            margin-left: 280px;
            width: 70rem;
            height: 20rem;
            float: left;
            border: 2px solid black;
        }

        .card3 {
            padding: 10px;
            margin-top: 20px;
            margin-left: 280px;
            width: 70rem;
            height: 20rem;
            float: left;
            border: 2px solid black;
        }
    </style>
</head>

<body>
    <div class="card">
        <center><b>
                <h1>Daftar Furniture I'dea</h1>
            </b></center>
        <div style="margin-top: 60px; margin-left:6rem;">
            <?php
            $angka = 1;
            foreach ($furnitures as $furniture) {
                echo "<h2>" . $angka++ . ". Nama Furniture : " . $furniture["nama"] .
                    "<br> Harga : " . $furniture["harga"] . "<br>" . "</h2>";
            }
            ?>
        </div>
    </div>
    <div class="card2">
        <div style="margin-top:50px; margin-left:6rem;">
            <form action="" method="post">
                <h2>Pilih Furniture Rakitan :
                    <select name="rakitan" style="height:25px; width:200px;">
                        <option disabled hidden selected>---Pilih---</option>
                        <?php
                        foreach ($furnitures as $key => $value) {
                            if ($value["tipe"] == "rakitan") {
                        ?>
                                <option value="<?= $key ?>"><?= $value["nama"] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <br><br>
                    Jumlah Pembelian Furniture Rakitan :
                    <input type="number" name="R" style="height:20px;">
                    <br><br>
                    Pilih Furniture Tidak Rakitan :
                    <select name="Trakitan" style="height:25px; width:200px;">
                        <option disabled hidden selected>---Pilih---</option>
                        <?php
                        foreach ($furnitures as $key => $value) {
                            if ($value["tipe"] == "non-rakitan") {
                        ?>
                                <option value="<?= $key ?>"><?= $value["nama"] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <br><br>
                    Jumlah Pembelian Furniture Tidak Rakitan :
                    <input type="number" name="nR" style="height:20px;"><br>
                </h2>
                <input type="submit" name="kirim" value="Beli" style="width:930px; height:25px;">
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST["kirim"])) {
        $rakitan = $_POST['rakitan'];
        $R = $_POST['R'];
        $nonRakitan = $_POST['Trakitan'];
        $nR = $_POST['nR'];

        $total = ($furnitures[$rakitan]['harga'] * $R) + ($furnitures[$nonRakitan]['harga'] * $nR);
    ?>
        <div class="card3">
                <?php
                echo "<h1><center> Bukti Pembelian </center></h1> ";
                ?>
                 <div style="margin-left:6rem;">
                <?php
                echo "<h2>";
                echo " <br><br><br>Furnitur Rakitan : " . $furnitures[$rakitan]['nama'] . "(" . $R . ")";
                echo "<br> Harga Furniture Rakitan : Rp. " . number_format($furnitures[$rakitan]['harga'] * $R, 2, ',', '.');
                echo "<br> Furnitur Non Rakitan : " . $furnitures[$nonRakitan]['nama'] . "(" . $nR . ")";
                echo "<br> Harga Furniture Non Rakitan : Rp. " . number_format($furnitures[$nonRakitan]['harga'] * $nR, 2, ',', ',');
                echo '<br> Total Pembayaran : Rp. ' . number_format($total, 2, ',', ',');
                echo "</h2>";
                ?>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>