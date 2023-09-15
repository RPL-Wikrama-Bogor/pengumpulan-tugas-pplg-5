<?php
    $furnitures = [
        [
            'nama' => 'rak piring 100cm X 200cm',
            'harga' => 300000,
            'tipe' => 'rakitan'
        ],
        [
            'nama' => 'meja belajar classic',
            'harga' => 150000,
            'tipe' => 'non-rakitan'
        ],
        [
            'nama' => 'kursi taman 2 seater',
            'harga' => 270000,
            'tipe' => 'non-rakitan'
        ],
        [
            'nama' => 'lemari panjang 5 susun',
            'harga' => 487000,
            'tipe' => 'rakitan'
        ],
        [
            'nama' => 'meja rias tipe europe',
            'harga' => 50000,
            'tipe' => 'non-rakitan'
        ],
        [
            'nama' => 'ranjang bayi',
            'harga' => 450000,
            'tipe' => 'rakitan'
        ]
        
    ];
?> 
<style>
    .data {
        outline: auto;
            width: 620px;
            padding: 8px 16px;
            background-color:FFFADD;
            max-width: 900px;
            margin: 0 auto;
    }
    .kirim {
        outline: auto;
            width: 620px;
            padding: 8px 16px;
            background-color:FFFADD;
            max-width: 900px;
              margin: 0 auto;
    }
    .hasil {
        outline: auto;
            width: 620px;
            padding: 8px 16px;
            background-color:FFFADD;
            max-width: 900px;
              margin: 0 auto;
    }
    button {
        width: 215%;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <section class="data">
    <h2><center>Data furnitures I'dea</h2>
    <div class="daftar">
        <ol>
            <?php
            foreach ($furnitures as $key => $item) {
                echo "<li> nama produk : ". $item['nama'];
                echo "<br>";
                echo "harga : ". $item['harga']. "</li>";
            }
            ?>
            
        </ol>
        </section>
        <br>
        <section class="kirim">
        <form action="" method="post">
        <table>
            <tr>
                <td>Pilih Furniture Rakitan : </td>
                <td><select name="rakitan" id="">
                <option hidden selected>---Pilih---</option>
                <?php
                foreach ($furnitures as $key => $item) {
                    if ($item['tipe'] == "rakitan") {
                        echo '<option value="' . $key . '">' . $item['nama'] . '</option>';
                    }
                }
                ?>
                </select></td>
            </section>
            </tr>

            <tr>
                <td>Jumlah Pembelian Furniture Rakitan  : </td>
                <td><input type="number" name="jmlhrakitan"></td>
            </tr>

            <tr>
                <td>Pilih Furniture Tidak Rakitan : </td>
                <td><select name="non-rakitan" id="">
                <option hidden selected>---Pilih---</option>
                <?php
                foreach ($furnitures as $key => $item) {
                    if ($item['tipe'] == "non-rakitan") {
                        echo '<option value="' . $key . '">' . $item['nama'] . '</option>';
                    }
                }
                ?>
                </select></td>
            </tr>

            <tr>
                <td>Jumlah Pembelian Furniture Tidak Rakitan  : </td>
                <td><input type="number" name="jmlhnonrakitan"></td>
            </tr>

            <tr>
                <td><button type="submit" name="submit">Beli</button></td>
            </tr>
        </table>
            </section>
</body>
</html>
<br> 
<?php
if (isset($_POST['submit'])) {
    $rakitan = $_POST['rakitan'];
    $jmlhrakitan = $_POST['jmlhrakitan'];
    $nonrakitan = $_POST['non-rakitan'];
    $jmlhnonrakitan = $_POST['jmlhnonrakitan'];

    $hargarakitan = $furnitures[$rakitan]['harga'] * $jmlhrakitan ;
    $harganonrakitan = $furnitures[$nonrakitan]['harga'] * $jmlhnonrakitan;

    $totalharga = ($hargarakitan * $jmlhrakitan) + ($harganonrakitan * $jmlhnonrakitan);?>
    <section class="hasil">
    <?php
    echo "Furniture rakitan: " . $furnitures[$rakitan]['nama'] . " ($jmlhrakitan)";
    echo " <br> Harga furniture rakitan: Rp." . number_format($hargarakitan,2,",",".") ;
    echo " <br> Furniture non-rakitan: " . $furnitures[$nonrakitan]['nama'] . " ($jmlhnonrakitan)";
    echo " <br>Harga furniture non-rakitan: Rp." . number_format($harganonrakitan,2,",",".");
    echo " <br>Total pembayaran: Rp." . number_format($totalharga,2,",",".");
}
?>
</section>
</section>
