<!DOCTYPE html>
<center>
<div class="card" style="border : 1px solid black; 
                        text-align:center; 
                        width:30rem; ">
<?php
$barangs = [
    [
        'nama' => 'Rak Piring 100cm x 200cm',
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

//Menampilkan isi array
foreach ($barangs as $index => $data) {
    echo ($index + 1) . ". " . $data["nama"] . "<br>" . "Harga: Rp " .
    "<b>".number_format($data["harga"], 0, ',', '.') . "</b> <br>";
}
?>
</div>


<br><br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Array 2</title>
</head>
<body>
    <div class="crad" style="border : 1px solid black; 
                        text-align:center; 
                        width:30rem; ">
    <form action="" method="post">
    <!-- input rakitan -->
        <label>Pilih Furniture Rakitan : </label>
        <select name="rakitan">
            <option disabled hidden selected>---Pilih---</option>
            <?php
            foreach($barangs as $barang){
                if($barang['tipe'] === 'rakitan'){
                    echo '<option value="'.$barang['nama'] . '">' . $barang['nama'] . '</option>';
                }
            }
            ?>
        </select>
    <!-- input jumlah rakitan-->
        <br>
        <label>Jumlah Pembelian Furniture Rakitan : </label>
        <input type="number" name="jmlRakitan" placeholder="Jumlah Rakitan"><br>
    <!-- input non-Rakitan -->
        <label>Pilih Furniture Non-Rakitan : </label>
        <select name="non-rakitan">
            <option disabled hidden selected>---Pilih---</option>
            <?php
            foreach($barangs as $barang){
                if($barang['tipe'] === 'non-rakitan'){
                    echo '<option value="'.$barang['nama'] . '">' . $barang['nama'] . '</option>';
                }
            }
            ?>
        </select>
        <br>
    <!-- jumlah non-rakitan -->
        <label>Jumlah Pembelian Furniture Tidak Rakitan : </label>
        <input type="number" name="jmlNonRakitan" placeholder="Jumlah non-Rakitan"><br>
        <button type="submit" name="submit">Kirim</button>
    </form>
</div>
    <div class="card" style="border : 1px solid black; 
                        text-align:center; 
                        width:30rem; ">
    <!-- output rakitan -->
    <?php if (isset($_POST["submit"])): 
 
            //intval=digunakan untuk mengonversi nilai menjadi bilangan bulat (integer).
        $rakitan = $_POST["rakitan"];
        $jmlRakitan = ($_POST["jmlRakitan"]);
        $nonRakitan = $_POST["non-rakitan"];
        $jmlNonRakitan = ($_POST["jmlNonRakitan"]);
            //array_serch = digunakan untuk mencari nilai tertentu dalam sebuah array dan mengembalikan indeks pertama di mana nilai tersebut ditemukan.
            //array_column = digunakan untuk mengambil semua nilai dari kolom tertentu dalam sebuah array asosiatif atau array numerik dan mengembalikan array baru yang berisi nilai-nilai dari kolom tersebut.
        $rakitanIndex = array_search($rakitan, array_column($barangs, 'nama'));
        $nonRakitanIndex = array_search($nonRakitan, array_column($barangs, 'nama'));

        $hargaRakitan = $jmlRakitan * $barangs[$rakitanIndex]['harga'];
        $hargaNonRakitan = $jmlNonRakitan * $barangs[$nonRakitanIndex]['harga'];
        $jumlahKseluruhanHarga = $hargaRakitan + $hargaNonRakitan;
        ?>

        <h2>Detail Pesanan:</h2>
        <?php if ($jmlRakitan > 0) : ?>
            <p>Furniture Rakitan: <?= $rakitan; ?> <<?= $jmlRakitan; ?>>  </p>
            <p>Harga Furnitur Rakitan: Rp <?= number_format($hargaRakitan, 0, ',', '.'); ?></p>
        <?php endif; ?>

        <?php if ($jmlNonRakitan > 0) : ?>
            <p>Furniture Non     Rakitan: <?= $nonRakitan; ?> <<?= $jmlNonRakitan; ?>> </p>
            <p>Harga Furniture Non Rakitan: Rp <?= number_format($hargaNonRakitan, 0, ',', '.'); ?></p>
        <?php endif; ?>
        <p>Total Pembayaran : Rp <?= number_format($jumlahKseluruhanHarga, 0, ',', '.'); ?> </p>
    <?php endif; ?>

    </center>
    </div>
</body>
</html>
