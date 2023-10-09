<?php
require 'array.php'; // Pastikan file 'array.php' ada dan berisi data furnitur.


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $inputNamaRakitan = $_POST['namaRakitan'];
    $jumlahRakitan = $_POST['jumlahRakitan'];

// buat yang non rakitan

    $inputNamaNonRakitan = $_POST['namaNoRakitan'];
    $jumlahNonRakitan = $_POST['jumlahNorakitan'];

    // cari nama barang furnitur yang dipilih berdasarkan input dan array
    $namaFurnitureRakitan = $furnitures[$inputNamaRakitan]['nama'];

    // Hitung harga dari masing masing barangnya 
    // empty tuh buat ngecek nilai nya kosong gak kalo ya true
    if ($namaFurnitureRakitan == '') {
        echo "Tidak ada pilihan yang valid";
    } else {
        $totalHargaRakitan = $furnitures[$inputNamaRakitan]['harga'] * $jumlahRakitan;
    }
    
      // apakah pengguna telah memilih nama furnitur rakitan yang valid 
    $namaFurnitureNonRakitan = $furnitures[$inputNamaNonRakitan]['nama'];


    if ($namaFurnitureNonRakitan !== '') {
        $totalHargaNonRakitan = $furnitures[$inputNamaNonRakitan]['harga'] * $jumlahNonRakitan;
    }

    // Buat bukti pembelian sesuai dengan barang yang dibeli.
    $buktiPembelian = "Furniture Rakitan :  $namaFurnitureRakitan ($jumlahRakitan)\n" . "<br>";
    $buktiPembelian .= "Harga Furniture Rakitan: $totalHargaRakitan\n". "<br>";
    $buktiPembelian .= "Furniture Tidak Rakitan: $namaFurnitureNonRakitan ($jumlahNonRakitan)\n". "<br>";
    $buktiPembelian .= "Harga Furniture Tidak Rakitan: $totalHargaNonRakitan\n". "<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        font-size: 35px;
        top: 0;
    } ol li {
        text-align: start;
    }
    button {
        font-size: 17px;
        width: 750px;
        padding: 0.5em 2em;
        border: transparent;
        box-shadow: 2px 2px 4px rgba(0,0,0,0.4);
        background: dodgerblue;
        color: white;
        border-radius: 4px;
    }

    button:hover {
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgba(30,144,255,1) 0%, rgba(0,212,255,1) 100%);
    }

    button:active {
        transform: translate(0em, 0.2em);
    }
</style>
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
        <br>
        <label for="jumlahRakitan">Jumlah pembelian Furniture Rakitan:</label>
        <input type="number" name="jumlahRakitan" id="jumlahRakitan" min="1">
        <br>

        <label for="namaNoRakitan">Pilih Furniture Tidak Rakitan:</label>
        <select name="namaNoRakitan" id="namaNoRakitan">
            <option disabled hidden selected>---Pilih---</option>
            <?php foreach ($furnitures as $key => $item) : ?>
                <?php if ($item['tipe'] == 'non-rakitan') : ?>
                    <option value="<?= $key; ?>"><?= $item['nama']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="jumlahNorakitan">Jumlah pembelian Furniture Tidak Rakitan:</label>
        <input type="number" name="jumlahNorakitan" id="jumlahNorakitan" min="1">
        <br><br>
        <button type="submit" name="beli">Beli</button>
    </form>
</div>

    </form>
</div>

<div class="bukti">
    <?php
    // Tampilkan bukti pembelian jika sudah ada data bukti pembelian.
    if (isset($buktiPembelian)) {
        echo "<h1>Bukti Pembelian</h1>";
        echo "<p>$buktiPembelian</p>";

        // Menampilkan total harga keseluruhan
        $totalHargaKeseluruhan = $totalHargaRakitan + $totalHargaNonRakitan;
        echo "Total Harga Keseluruhan: " . "<b>" . number_format($totalHargaKeseluruhan, 2, ',', '.') . "</b>";
    }
    ?>
</div>
</body>
</html>
