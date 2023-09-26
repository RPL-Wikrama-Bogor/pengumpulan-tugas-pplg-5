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
    <style>
        .class {
    border-style: solid;
    border-width: 2px; 
    padding: 35px; 
    margin-bottom: 50px;

}

        .h1{
            text-align: center;
        }
        
        .form{
            border-style: solid;
            border-widht: medium;
            height: 20rem;
            
        }

        .bukti {
            border-style: solid;
            border-width: 2px; 
            padding: 6rem; 
            margin-bottom: 50px;
            margin-top:2rem;
        }
        .bukti p{
            margin-bottom:3rem;
        }
        .h2 {
            text-align: center;
        }
        .text {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="class">
<h1 class="h1">Daftar Furniture I'dea</h1>
<ol class="ol">
    <?php
    foreach ($furnitures as $furniture) {
        $displayName = isset($furniture['nama2']) ? $furniture['nama2'] : $furniture['nama'];
        echo '<li>' . $displayName . ' - Rp ' . number_format($furniture['harga'], 0, ',', '.') . ' - ' . $furniture['tipe'] . '</li>';
    }
    ?>
</ol>

<div>
    </div>
    </div>
    <div class="form">
    <form action="" method="post">
        <p>Pilih Furniture Rakitan:</p> 
        <select name="nama_id">
            <?php
            foreach ($furnitures as $key => $item) {
                if ($item['tipe'] == 'rakitan') {
                    echo '<option value="' . $key . '">' . $item['nama'] . '</option>';
                }
            }
            ?>
        </select>
        <p>Jumlah Pembelian Furniture Rakitan:</p>
        <input type="number" name="jumlah_rakitan">
        
        <p>Pilih Furniture Tidak Rakitan:</p>
        <select name="nama_id_non_rakitan">
            <?php
            foreach ($furnitures as $key => $item) {
                if ($item['tipe'] == 'non-rakitan') {
                    echo '<option value="' . $key . '">' . $item['nama'] . '</option>';
                }
            }
            ?>
        </select>
        <p>Jumlah Pembelian Furniture Tidak Rakitan:</p>
        <input type="number" name="jumlah_non_rakitan">
        <input type="submit" name="submit" value="Beli">
    </form>
    <br> <br>
    <div class="bukti">

    
  
    </div>
</div>
<br><br>
<div class="butki" >
    <h2 class="h2">Bukti Pembelian </h2>
<?php   
    if(isset($_POST['submit'])){
        $nama_rakitan_id = $_POST['nama_id'];
        $nama_non_rakitan_id = $_POST['nama_id_non_rakitan'];
        $jumlah_rakitan_id = $_POST['jumlah_rakitan'];
        $jumlah_non_rakitan_id = $_POST['jumlah_non_rakitan'];
        $harga_rakitan = $furnitures[$nama_rakitan_id]['harga'];
        $harga_non_rakitan = $furnitures[$nama_non_rakitan_id]['harga'];
        $harga_total_rakitan = $harga_rakitan * $jumlah_rakitan_id;
        $harga_total_non_rakitan = $harga_non_rakitan * $jumlah_non_rakitan_id;
        $harga_total = $harga_total_rakitan + $harga_total_non_rakitan;
        ?>  <?php
    
        echo "Furniture Rakitan: " . $furnitures[$nama_rakitan_id]['nama'] . "(" . $jumlah_rakitan_id . ")<br>";
        echo "Harga Furniture Rakitan: Rp" . number_format($harga_total_rakitan, 0, ',', '.') . "<br>";
        echo "Furniture Non Rakitan:" . $furnitures[$nama_non_rakitan_id]['nama2'] . "(" . $jumlah_non_rakitan_id . ")<br>";
        echo "Harga Furniture Non Rakitan: Rp" . number_format($harga_total_non_rakitan, 0, ',', '.') . "<br>";
        echo "Total Pembayaran: Rp" . number_format($harga_total, 0, ',', '.') . "<br>";
    }
    ?>
    
    </div>



</body>
</html>