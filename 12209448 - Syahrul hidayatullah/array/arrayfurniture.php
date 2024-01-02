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

foreach ($furnitures as $furniture) {
    echo "<center><table style='border:1px solid black; padding:13px; width:400px'>";
    echo "<tr>";
    echo "<td>" . $furniture['nama'] . "</td>";
    echo "<td>Rp" . number_format($furniture['harga'], 0, ',', '.') . "</td>";
    echo "<td>" . $furniture['tipe'] . "</td>";
    echo "</tr>";
    echo "</center></table>";
}

?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <table border="2">


        <h2>Pilih furniture Rakitan</h2>
        <form method="post" action="">
            <table>
                <label for="item">Pilih furniture:</label>
                <select name="item" id="item">
                <option disabled selected hidden>======SOK DIPILIHWE======</option>
                    <?php
                    foreach ($furnitures as $furniture) {
                        if ($furniture['tipe'] === 'rakitan') {
                            echo '<option value="' . $furniture['nama'] . '">' . $furniture['nama'] . '</option>';
                        }
                    }
                    ?>
                </select>
                <br>
                <label for="jumlah">Jumlah:</label>
                <input type="number" name="jumlah" id="jumlah" min="1">


                <h2>Pilih Furniture Non-Rakitan</h2>

                <label for="item-non-rakitan">Pilih Furnitur:</label>
                <select name="item-non-rakitan" id="item-non-rakitan">
                <option disabled selected hidden>======SOK DIPILIHWE======</option>
                    <?php
                    foreach ($furnitures as $furniture) {
                        if ($furniture['tipe'] === 'non-rakitan') {
                            echo '<option value="' . $furniture['nama'] . '">' . $furniture['nama'] . '</option>';
                        }
                    }
                    ?>
                </select>
                <br>
                <label for="jumlah-non-rakitan">Jumlah:</label>
                <input type="number" name="jumlah-non-rakitan" id="jumlah-non-rakitan" min="1">
                <br>
                <input type="submit" name="submit" value="Hitung Total Harga">
            </table>
        </form>

        <?php

        if (isset($_POST['submit'])) {
            $item1 = $_POST['item-non-rakitan'];
            $jumlah1 = ($_POST['jumlah-non-rakitan']);

            $item2 = $_POST['item'];
            $jumlah2 = ($_POST['jumlah']);




            foreach ($furnitures as $furniture) {
                if ($furniture['nama'] === $item1 && $furniture['tipe'] === 'non-rakitan') {
                    $ambilfur1 = $furniture;

                }
                if ($furniture['nama'] === $item2 && $furniture['tipe'] === 'rakitan') {

                    $ambilfur2= $furniture;


                }

            }
            
            $hargaTotal1 = $ambilfur1['harga'] * $jumlah1;
            $hargaTotal2 = $ambilfur2['harga'] * $jumlah2;
            $p = $hargaTotal1 + $hargaTotal2;

            echo '<h2>Bukti Pembelian:</h2>';
            echo '<p>' .'Barang  Non-rakit: '. $item1 ;
            echo '<p>' .'Harga Barang Yang di Non-rakit '.   ' = Rp '  .  number_format($hargaTotal1, 0, ',', '.') . '</p>';
            echo '<p>' .'Barang  Dirakit: '. $item2 ;
            echo '<p>' .'Harga Barang Yang di Dirakit '.   ' = Rp '  .  number_format($hargaTotal2, 0, ',', '.') . '</p>';
            echo '<p>' .'<h2>'.'Total Harga'.  ' = Rp '  .  number_format($p, 0, ',', '.') . '</p>';
            

        }
        ?>
        
</body>

</html>