<?php 
// data
$furnitures = [
    [
        "nama" => "Rak piring 100cm X 200cm",
        "harga" => 300000,
        "tipe" => "rakitan"
    ],
    [
        "nama" => "Meja belajar classic",
        "harga" => 150000,
    
        "tipe" => "non-rakitan"
    ],
    [
        "nama" => "Kursi taman 2",
        "harga" => 270000,
        "tipe" => "non-rakitan"
    ],
    [
        "nama" => "Lemari pajangan 5 susun",
        "harga" => 487000,
        "tipe" => "rakitan"
    ],
    [
        "nama" => "Meja rias tipe Europe",
        "harga" => 50000,
        "tipe" => "non-rakitan"
    ],
    [
        "nama" => "Ranjang Bayi",
        "harga" => 450000,
        "tipe" => "rakitan"
    ],
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $inputNamaRakitan = $_POST['nama_rakitan'];
    $jumlahRakitan = (int)$_POST['jumlah_rakitan'];

    $inputNamaNonRakitan = $_POST['nama_non_rakitan'];
    $jumlahNonRakitan = (int)$_POST['jumlah_non_rakitan'];

    $buktiPembelian = "Pembelian Furniture Rakitan: $inputNamaRakitan ($jumlahRakitan buah)\n";
    $buktiPembelian .= "Pembelian Furniture Tidak Rakitan: $inputNamaNonRakitan ($jumlahNonRakitan buah)\n";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<div class="furniture">

<h1>Daftar Furniture I'dea</h1>

<ol>
<?php foreach ($furnitures as $furniture) : ?>
    <li>Nama <?= $furniture['nama']; ?>. <br>
        Harga : <?= $furniture['harga']; ?>
    </li>
<?php endforeach; ?>
</ol>

</div>
<div class="selects">
    <form method="post">
        <label for="nama_rakitan">Pilih Furniture Rakitan:</label>
        <select name="nama_rakitan" id="nama_rakitan">
            <option disabled hidden selected>---Pilih---</option>
            <?php foreach ($furnitures as $key => $item) : ?>
                <?php if ($item['tipe'] == 'rakitan') : ?>
                    <option value="<?= $key; ?>"><?= $item['nama']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="jumlah_rakitan">Jumlah pembelian Furniture Rakitan:</label>
        <input type="number" name="jumlah_rakitan" id="jumlah_rakitan" min="1">
        <br>

        <label for="nama_non_rakitan">Pilih Furniture Tidak Rakitan:</label>
        <select name="nama_non_rakitan" id="nama_non_rakitan">
            <option disabled hidden selected>---Pilih---</option>
            <?php foreach ($furnitures as $key => $item) : ?>
                <?php if ($item['tipe'] == 'non-rakitan') : ?>
                    <option value="<?= $key; ?>"><?= $item['nama']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="jumlah_non_rakitan">Jumlah pembelian Furniture Tidak Rakitan:</label>
        <input type="number" name="jumlah_non_rakitan" id="jumlah_non_rakitan" min="1">
        <br>
        <button type="submit" name="beli">Beli</button>
    </form>
</div>


<div class="bukti">
    <?php
    if (isset($buktiPembelian)) {
        $rakit = $_POST['nama_rakitan'];
        $harga =$_POST['jumlah_rakitan'];
        $non_rakit =$_POST['nama_non_rakitan'];
        $harga_nonrakit = $_POST['jumlah_non_rakitan'];
        $r = $furnitures[$rakit]['nama'];
        $n = $furnitures[$non_rakit]['nama'];
        $rp =$furnitures[$rakit]['harga']*$harga;
        $pr =$furnitures[$non_rakit]['harga']*$harga_nonrakit;
        echo "<h1>Bukti Pembelian</h1>";
        echo "Barang Rakitan: $r - Jumlah: $harga - Harga Total: $rp<br>";
        echo "Barang Non-Rakitan: $n - Jumlah: $harga_nonrakit - Harga Total: $pr";
    }
    ?>
</div>