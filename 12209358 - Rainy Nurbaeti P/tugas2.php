<?php
$furniture = [
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
    <style>
        h3{
            text-align: center;
        }
        .apawe{
            border: 3px solid black;
            margin: 10px 10px;
            padding: 10px;
            width: 50%;
            margin-left: 24rem;
            

        }
        button{
            width:47rem ;

        }
    </style>
</head>
<body>

    <div class="apawe">
        <h3>bla bla bla</h3>
        <ol>
            <?php foreach ($furniture as $value) { ?>
                <li>Nama Furniture : <?php echo $value['nama']?> <br> Harga : <?php echo $value['harga']?></li>
            <?php 
            }
            ?>
        </ol>
    </div>

<form action="" method="post">
       
        <div class="apawe">
        <label>Pilih Furniture Rakitan</label>
        <select name="rakitan" id="">
            <option disable hidden> ---Pilih---</option>
            <?php
            foreach ($furniture as $key => $item) {
                if($item['tipe']=="rakitan"){
                ?>
                <option value="<?= $key ?>"><?= $item['nama']?></option>
                <?php
                }
            }
            ?>
        </select><br></br>
        <label>jumlah pembelian furniture rakitan</label>
        <input type="number" name="jumlahRakitan" >
        <br></br>
        <label>Pilih Furniture Tidak Rakitan</label>
        <select name="nonrakitan" id="">
            <option disable hidden> ---Pilih---</option>
            <?php
            foreach ($furniture as $key => $item) {
                if($item['tipe']=="non-rakitan"){
                ?>
                <option value="<?= $key ?>"><?= $item['nama']?></option>
                <?php
                }
            }
            ?>
        </select><br></br>
        <label>jumlah pembelian furniture rakitan</label>
        <input type="number" name="jumlahNonrakitan">
        <br></br>
        <button type="submit" name="submit">Beli Tiket</button>
    </form>

<?php
if (isset($_POST["submit"])) {
    $jumlahRakitan = $_POST['jumlahRakitan'];
    $jumlahNonrakitan = $_POST['jumlahNonrakitan'];
    $rakitanId = $_POST['rakitan'];
    $nonRakitanId = $_POST['nonrakitan'];

    $rakitan = $furniture[$rakitanId]['nama'];
    $nonRakitan = $furniture[$nonRakitanId]['nama'];
    $hargaRakitan = $furniture[$rakitanId]['harga'];
    $hargaNonRakitan = $furniture[$nonRakitanId]['harga'];

    $totalHargaRakitan = $hargaRakitan * $jumlahRakitan;
    $totalHargaNonRakitan = $hargaNonRakitan * $jumlahNonrakitan;
    $totalHarga = $totalHargaRakitan + $totalHargaNonRakitan;
   
?>
<?php
    echo "<h3 style='text-align: center;'>Bukti Pembelian</h3>";
    echo "Furniture Rakitan: " . $rakitan . " (" . $jumlahRakitan . ")" . "<br>";
    echo "Harga Furniture Rakitan: Rp " . number_format($hargaRakitan, 0, ',', '.') . "<br>";
    echo "Furniture Non Rakitan: " . $nonRakitan . " (" . $jumlahNonrakitan . ")" . "<br>";
    echo "Harga Furniture Non Rakitan: Rp " . number_format($hargaNonRakitan, 0, ',', '.') . "<br>";
    echo "Total Pembayaran: Rp " . number_format($totalHarga, 0, ',', '.');


    }
?>
</body>
