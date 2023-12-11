

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
    <title>Document</title>
    <style>
        .daftar {
            border: 2px solid black;
            font-size: 20px;
            width: 60%;
            margin-left:300px;
            background-color: silver;
            border-radius:20px;
        }
       

        form {
            border: 2px solid black;
            margin-top: 10px;
            width: 60%;
            margin-left:300px;
            background-color: silver;
            border-radius:20px;
        }
        .bukti {
            border: 2px solid black;
            margin-top: 10px;
            font-size:19px;
            width: 60%;
            margin-left:300px;
            background-color: silver;
            border-radius:20px;
            
            
        }
        .bukti ul{
            list-style: none;
            margin-left:10px;
        }
        h2{
            text-align: center;
        }
        h1{
            text-align: center;
        }
        button{
            width: 85%;
            margin-left:70px;
            margin-top:10px;
            margin-bottom:10px;
            background: gray;
            font-size:13px;
            
        }
        button:hover{
            background-color: silver;
         
       
        }
        select{
            width: 300px;
        }
        input{
            width: 300px;
        }
        p{
            
            font-size:20px;
            margin-top:10px;
            margin: 5px 20px -10px;
        }
        h3{
            margin-left:20px;
        }
        
      

    </style>
</head>
<body>
<div class="daftar">

    <h1>Daftar furnituret i'dea</h1>
    <ol>
        <?php foreach ($furnitures as $barang) : ?>
            <li>Nama furnitures : <?= $barang['nama'] ?></li>
            Harga: <?="<b>  Rp".number_format($barang['harga'],2,",",".")."</b>"  ?>
        <?php endforeach; ?>
    </ol>
        
</div>
<form action="" method="post">
    <p>Pilih furniture Rakitan :
    <select name="barang_rakitan">
        <option disabled hidden selected>------ PILIH ------</option>
        <?php foreach ($furnitures as $key => $item) : ?>
            <?php if ($item['tipe'] === 'rakitan') : ?>
                <option value="<?= $key; ?>">
                    <?= $item['nama']; ?>
                </option>
            <?php endif; ?>
        <?php endforeach ?>
    </select>
    </p>

    <br>
    <p>Jumlah pembelian furniture Rakitan : <input type="number" name="rakit"></p>
    <br>
    <p>Pilih furniture Tidak Rakitan :
    <select name="barang_non_rakitan">
        <option disabled hidden selected>------ PILIH ------</option>
        <?php foreach ($furnitures as $key => $item) : ?>
            <?php if ($item['tipe'] === 'non-rakitan') : ?>
                <option value="<?= $key; ?>">
                    <?= $item['nama']; ?>
                </option>
            <?php endif; ?>
        <?php endforeach ?>
    </select>
    </p>
    <br>
    <p>Jumalah pembelian furniture Tidak Rakitan : <input type="number" name="no_rakit"></p>
    <br>
   <button type="submit" name="beli">Beli</button>
</form>
<?php

$barangDibeli = [];
$totalHarga = 0;

if (isset($_POST['beli'])) {
    $barangRakitan = isset($_POST['barang_rakitan']) ? $_POST['barang_rakitan'] : null;
    $jumlahRakitan = isset($_POST['rakit']) ? intval($_POST['rakit']) : 0;

    $barangNonRakitan = isset($_POST['barang_non_rakitan']) ? $_POST['barang_non_rakitan'] : null;
    $jumlahNonRakitan = isset($_POST['no_rakit']) ? intval($_POST['no_rakit']) : 0;

    // Proses barang rakitan jika ada
    if ($barangRakitan !== null && isset($furnitures[$barangRakitan]) && $jumlahRakitan > 0) {
        $namaBarangRakitan = $furnitures[$barangRakitan]['nama'];
        $hargaBarangRakitan = $furnitures[$barangRakitan]['harga'] * $jumlahRakitan;
        
        $barangDibeli[] = [
            'nama' => $namaBarangRakitan,
            'jumlah' => $jumlahRakitan,
            'harga' => $hargaBarangRakitan,
        ];

        $totalHarga += $hargaBarangRakitan;
    }

    // Proses barang non-rakitan jika ada
    if ($barangNonRakitan !== null && isset($furnitures[$barangNonRakitan]) && $jumlahNonRakitan > 0) {
        $namaBarangNonRakitan = $furnitures[$barangNonRakitan]['nama'];
        $hargaBarangNonRakitan = $furnitures[$barangNonRakitan]['harga'] * $jumlahNonRakitan;
        
        $barangDibeli[] = [
            'nama' => $namaBarangNonRakitan,
            'jumlah' => $jumlahNonRakitan,
            'harga' => $hargaBarangNonRakitan,
        ];

        $totalHarga += $hargaBarangNonRakitan;
    }
}
?>
<?php if (!empty($barangDibeli)) : ?>
    <div class="bukti">
    <h2>bukti yang dibeli:</h2>
    <ul>
        <?php foreach ($barangDibeli as $barang) : ?>
            <li>Nama: <?= $barang['nama'] .("(".$barang['jumlah'].")") ?></li> 
            <li>Harga: <?= "<b>  Rp".number_format($barang['harga'],2,",",".")."</b>" ?></li>
        <?php endforeach; ?>
    </ul>
    <h3>Total pembayaran : <?="<b>  Rp".number_format($totalHarga,2,",",".")."</b>" ?></h3>
<?php endif; ?>
</div>
</body>
</html>
