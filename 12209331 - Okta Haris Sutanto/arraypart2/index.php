<?php

require 'array.php';
// pindahin file yang berisi data array

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $inputNamaRakitan = $_POST['namaRakitan'];
    $jumlahRakitan = (int)$_POST['jumlahRakitan'];

    $inputNamaNonRakitan = $_POST['namaNorakitan'];
    $jumlahNonRakitan = (int)$_POST['namaNorakitan'];

    // Lakukan logika perhitungan total harga sesuai dengan barang yang dibeli.

    // Buat bukti pembelian sesuai dengan barang yang dibeli.
    // Anda dapat menampilkan bukti pembelian di sini.

    // Contoh:
    $buktiPembelian = "Jumlah Pembelian Furniture Rakitan: $inputNamaRakitan ($jumlahRakitan)\n";
    $harga = 
    $buktiPembelian .= "Jumlah Pembelian Furniture Tidak Rakitan: $inputNamaNonRakitan ($jumlahNonRakitan)\n";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.furniture,
.bukti,
.selects {
    border: 3.5px solid;
    margin: 20px;
    padding: 20px;
    width: 750px;
    height: 60%;
    margin-left: 250px;
    border-radius: 15px;
}

.furniture h1,
.bukti h1 {
    text-align: center;
    font-size: 40px;
    top: 0;
}

ol li {
    text-align: start;
}

button {
    font-size: 17px;
    width: 750px;
    padding: 0.5em 2em;
    border: transparent;
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
    background: dodgerblue;
    color: white;
    border-radius: 4px;
}

button:hover {
    background: rgb(2, 0, 36);
    background: linear-gradient(90deg, rgba(30, 144, 255, 1) 0%, rgba(0, 212, 255, 1) 100%);
}

button:active {
    transform: translate(0em, 0.2em);
}
</style>

<body>


    <div class="furniture">

        <h1>Daftar $furniture I'dea</h1>

        <ol>
            <?php foreach ($furnitures as $furniture) : ?>
            <li>Nama <?= $furniture['nama']; ?>. <br>
                Harga: <?= $furniture['harga']; ?>
            </li>
            <?php endforeach; ?>
        </ol>

    </div>

    <!-- rakitan -->

    <div class="selects">
        <form method="post">
            <label for="namaRakitan">Pilih Furniture Rakitan:</label>
            <select name="namaRakitan" id="namaRakitan">
                <option disabled hidden selected>---Pilih---</option>
                <?php foreach ($furnitures as $key => $item) : ?>
                <?php if ($item['tipe'] == 'rakitan') : ?>
                <option value="<?= $key; ?>"><?= $item['nama']; ?></option>
                <?php endif; ?>
                <?php endforeach; ?>
            </select>

            <br><br>

            <label for="jumlahRakitan">jumlahRakitan pembelian Furniture Rakitan :</label>
            <input type="number" name="jumlahRakitan" id="jumlahRakitan" min="1">
            <br>

            <!-- non rakitan -->
            <label for="namaNorakitan">Pilih Furniture Tidak Rakitan: </label>
            <select name="namaNorakitan" id="namaNorakitan">
                <option disabled hidden selected>---Pilih---</option>
                <?php foreach ($furnitures as $key => $item) : ?>
                <?php if ($item['tipe'] == 'non-rakitan') : ?>
                <option value="<?= $key; ?>"><?= $item['nama']; ?></option>
                <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="jumlah">Jumlah pembelian Furniture Tidak Rakitan : </label>
            <input type="number" name="jumlah" id="jumlah" min="1">
            <br><br>
            <button type="submit" name="beli">Beli</button>
    </div>
    <!-- <input type="number" name="beli" id="" placeholder="masukan jumlahnya..."> -->
    </form>



    <!-- bukti pembelian -->


    <div class="bukti">
        <?php
// Tampilkan bukti pembelian jika sudah ada data bukti pembelian.
if (isset($buktiPembelian)) {
    echo "<h1>Bukti Pembelian</h1>";
    echo "<pre>$buktiPembelian</pre>";}
?>
    </div>
</body>

</html>