<?php
$barangs = [
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


$pesanAn = [];
$totalHarga = 0;

if (isset($_POST['tipeRakitan']) && isset($_POST['jumlahRakitan'])) {
    $tipeRakitan = $_POST['tipeRakitan'];
    $jumlahRakitan = (int)$_POST['jumlahRakitan'];

    if ($tipeRakitan !== 'semua' && $jumlahRakitan > 0) {
        foreach ($barangs as $barang) {
            if ($barang['nama'] === $tipeRakitan && $barang['tipe'] === 'rakitan') {
                $totalRakit = $jumlahRakitan * $barang['harga'];
                $pesanAn[] = [
                    'nama' => $barang['nama'],
                    'jumlah' => $jumlahRakitan,
                    'total' => $totalRakit,
                ];
                $totalHarga += $totalRakit;
                break;
            }
        }
    }
}

if (isset($_POST['tipeNonRakitan']) && isset($_POST['jumlahNonRakitan'])) {
    $tipeNonRakitan = $_POST['tipeNonRakitan'];
    $jumlahNonRakit = (int)$_POST['jumlahNonRakitan'];

    if ($tipeNonRakitan !== 'semua' && $jumlahNonRakit > 0) {
        foreach ($barangs as $barang) {
            if ($barang['nama'] === $tipeNonRakitan && $barang['tipe'] === 'non-rakitan') {
                $totalNonRakit = $jumlahNonRakit * $barang['harga'];
                $pesanAn[] = [
                    'nama' => $barang['nama'],
                    'jumlah' => $jumlahNonRakit,
                    'total' => $totalNonRakit,
                ];
                $totalHarga += $totalNonRakit;
                break;
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>riet euyy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
    body{
        background-color: #e1e1e1;
    }
    .card{
        display: inline-block;
        
    }
</style>
<div class="card" style="width:30rem; padding:4rem;">
<h1>daftar baranh</h1>
<?php 
echo '<ul>';
foreach ($barangs as $barang) {
    echo '<li>' . $barang['nama'] . ' - Harga: Rp ' . number_format($barang['harga']) . '</li>';
}
echo '</ul>';
?>

</div>
<body>
    <div class="card" style="width:30rem; padding:4rem;">
    <h1>giblar tampan</h1>

    <form method="post">
      <br>  <label for="tipeRakitan">Furniture Rakitan:</label><br>
        <select  name="tipeRakitan" class="form-select">
            <option value="semua" disabled hidden selected>-------------------pilih--------------------</option>
            <?php
            foreach ($barangs as $barang) {
                if ($barang['tipe'] === 'rakitan') {
                    echo '<option value="' . $barang['nama'] . '">' . $barang['nama'] . '</option>';
                }
            }
            ?>
        </select>

       <br> <label for="jumlahRakitan">Jumlah Rakitan:</label><br>
        <input type="number" name="jumlahRakitan" min="0" class="form-control">
<br>
        <label for="tipeNonRakitan">Furniture Non-Rakitan:</label><br>
        <select name="tipeNonRakitan" class="form-select" >
            <option value="semua"disabled hidden selected>-------------------pilih--------------------</option>
            <?php
            foreach ($barangs as $barang) {
                if ($barang['tipe'] === 'non-rakitan') {
                    echo '<option value="' . $barang['nama'] . '">' . $barang['nama'] . '</option>';
                }
            }
            ?>
        </select>
            
       <br> <label for="jumlahNonRakitan">Jumlah Non-Rakitan:</label><br>
        <input type="number"  name="jumlahNonRakitan" min="0" class="form-control" >
<br><br>
        <button type="submit" class="btn btn-dark" style="width:100%;">buat pesanan</button>
    </form>
    </div>
    <div class="card" style="width:30rem; padding:3rem;">
    <?php if (count($pesanAn) > 0) : ?>
        <h2>Pesanan Anda</h2>
        <ul>
            <?php foreach ($pesanAn as $pesanan) : ?>
                <li><?php echo $pesanan['nama']; ?> (Jumlah: <?php echo $pesanan['jumlah']; ?>) - total: Rp <?php echo number_format($pesanan['total']); ?></li>
            <?php endforeach; ?>
        </ul>
        <p>Total : Rp <?php echo number_format(2,''$totalHarga); ?></p>
    <?php endif; ?>
    
    </div>
</body>
</html>
