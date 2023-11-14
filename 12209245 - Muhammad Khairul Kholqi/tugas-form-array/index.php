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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<ol>
<?php
    echo "<div class='furniture-box'>";
        echo "<p class='judul'>" . "Daftar Furniture I'dea" . "</p>";
        foreach($furnitures as $barang) {
            echo "<li class='no-barang'>" . "<p class='barang'>" . "Nama Furniture: " . $barang["nama"] . "</p>" . "</li>" . "<p class='harga-barang'>" . "Harga Rp: " . $barang["harga"] . "</p>" . "<br>";  
        }
    echo "</div>";
?>
</ol>

<div class="page-pembelian">
    <div class="all-pembelian">
    <div class="title-pembelian">
        <p>Form Pembelian Furniture</p>
    </div>
        <form action="" method="post">
            <span>Pilih Furniture Rakitan</span>
            <select name="rakit" id="">
                <option value="" disable hidden selected>---Pilih---</option>
                <?php foreach($furnitures as $key => $item) {
                    if ($item['tipe'] == 'rakitan') {
                        echo "<option value='$key'>" . $item['nama'] . "</option>";
                    }
                } ?>
            </select>

            <br><br>
            
            <span>Jumlah pembelian furniture rakitan</span>
            <input type="number" name="jumlah-rakitan">

            <br><br>

            <span>Pilih Furniture Tidak Rakitan</span>
            <select name="nonrakit" id="">
                <option value="" disable hidden selected>---Pilih---</option>
                <?php foreach($furnitures as $key => $item) {
                    if ($item['tipe'] == 'non-rakitan') {
                        echo "<option value='$key'>" . $item['nama'] . "</option>";
                    }
                } ?>
            </select>

            <br><br>

            <span>Jumlah pembelian furniture tidak rakitan</span>
            <input type="number" name="jumlah-nonrakitan">

            <br><br>

            <button type="submit" name="kirim">Beli</button>

        </form>
    </div>
</div>

<div class="hasil-pembelian">
    <p class="bukti">Bukti Pembelian</p>
    <?php
        if(isset($_POST["kirim"])) {
            if(isset($_POST["rakit"]) && is_numeric($_POST["rakit"])) {
                if(isset($_POST["jumlah-rakitan"]) && is_numeric($_POST["jumlah-rakitan"])) {
                    if(isset($_POST["nonrakit"]) && is_numeric($_POST["nonrakit"])) {
                        if(isset($_POST["jumlah-nonrakitan"]) && is_numeric($_POST["jumlah-nonrakitan"])) {
                            $rakitan = $_POST["rakit"];
                            $nonrakitan = $_POST["nonrakit"];
                            $jumlahRakitan = $_POST["jumlah-rakitan"];
                            $jumlahNonRakitan = $_POST["jumlah-nonrakitan"];
                            $hargaTotalRakitan = 0;
                            $hargaTotalNonRakitan = 0;
                            $namarakitan = $furnitures[$rakitan]["nama"];
                            $namanonrakitan = $furnitures[$nonrakitan]["nama"];

                            if ($rakitan >= 0 && $jumlahRakitan > 0) {
                                $hargaTotalRakitan = $furnitures[$rakitan]["harga"] * $jumlahRakitan;
                            }

                            if ($nonrakitan >= 0 && $jumlahNonRakitan > 0) {
                                $hargaTotalNonRakitan = $furnitures[$nonrakitan]["harga"] * $jumlahNonRakitan;
                            }

                            $totalHarga = $hargaTotalRakitan + $hargaTotalNonRakitan;

                            echo "<p style='font-family: arial;'>" . $namarakitan . ", membeli: " . $jumlahRakitan . "</p>" . "<br>";
                            echo "<p style='font-family: arial;'>" . "Total harga rakitan: Rp." . number_format($hargaTotalRakitan, 0, ',', '.') . "</p>" .  "<br>";

                            echo "<p style='font-family: arial;'>" . $namanonrakitan . ", membeli: " . $jumlahNonRakitan . "</p>" .  "<br>";
                            echo"<p style='font-family: arial;'>" . "Total harga tidak rakitan: Rp." . number_format($hargaTotalNonRakitan, 0, ',', '.') . "</p>" .  "<br>";

                            echo "<p style='font-family: arial;'>" . "Total pembayaran Rp." . number_format($totalHarga, 0, ',', '.') . "</p>" ;
                        }
                    }
                } else {
                    echo "<p style='color: red; font-style: italic; text-align: center;'>Masukkan Jumlah Pembelian yang Valid!</p>";
                }
            } else {
                echo "<p style='color: red; font-style: italic; text-align: center;'>Pilih Furniture yang Valid!</p>";
            }
        }
    ?>
</div>
</body>
</html>
