<?php
$furnitures = [
    [
        'nama' => 'Rak Piring 100cm  X 200cm',
        'harga' => '300000',
        'tipe' => 'rakitan'
    ],
    [
        'nama' => 'Meja Belajar Classic',
        'harga' => '150000',
        'tipe' => 'non-rakitan'
    ],
    [
        'nama' => 'Kursi Taman 2 Seater',
        'harga' => '270000',
        'tipe' => 'non-rakitan'
    ],
    [
        'nama' => 'Lemari Pajangan 5 susun',
        'harga' => '487000',
        'tipe' => 'rakitan'
    ],
    [
        'nama' => 'Meja Rias Tipe Europe',
        'harga' => '50000',
        'tipe' => 'non-rakitan'
    ],
    [
        'nama' => 'Ranjang Bayi',
        'harga' => '450000',
        'tipe' => 'rakitan'
    ],
]
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture</title>
    <style>
        .card-top{
            width: 1000px;
            outline: auto;
            margin: 10px 130px;
        }
        .card-top h2{
            text-align: center;
            padding-top: 50px;
            font-size: 40px;
        }
        .card-top ol{
            padding: 20px 0px 100px 80px;
            font-size: 20px;
        }
        .card-content{
            margin: 10px 130px;
            width: 940px;
            outline: auto;
            padding: 30px 30px 10px 30px;
            font-size: 20px;
        }
        .card-content button{
            width: 100%;
            height: 30px;
            font-size: 15px;
        }
        .output{
            outline: auto;
            width: 940px;
            margin: 20px 130px;
            padding: 30px;
            font-size: 20px;
        }
        .output h2{
            margin-top: 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <section class="list">
        <div class="card-top">
            <h2>Daftar Furniture I'dea</h2>
            <ol>
                <?php foreach($furnitures as $furniture){
                    echo "<li> Nama Furniture : " . $furniture['nama'] . "<br> Harga : " . $furniture['harga'] . "</li>";
                }?>
            </ol>
        </div>
    </section>
    <section class="content">
        <div class="card-content">
            <form action="" method="post">
                <label for="nama_rakitan">Pilih Furniture Rakitan : </label>
                <select name="nama_rakitan_id">
                    <option disabled hidden selected>--- Pilih ---</option>
                    <?php foreach($furnitures as $key => $item){
                        if($item['tipe'] == 'rakitan'){?>
                            <option value="<?= $key?>"><?= $item['nama']?></option>
                    <?php }
                    }?>
                </select>
                <br><br>
                    <label for="jumlah_rakitan">Jumlah Pembelian Furniture Rakitan : </label>
                    <input type="number" name="jumlah_rakitan" min="0">
                <br><br>
                <label for="nama_nonrakitan_id">Pilih Furniture Tidak Rakitan : </label>
                <select name="nama_nonrakitan_id">
                    <option disabled hidden selected>--- Pilih ---</option>
                    <?php foreach($furnitures as $key => $item){
                        if($item['tipe'] == 'non-rakitan'){?>
                        <option value="<?= $key?>"><?= $item['nama']?></option>
                    <?php }
                    }?>
                </select>
                <br><br>
                    <label for="jumlah_nonrakitan">Jumlah Pembelian Furniture Rakitan : </label>
                    <input type="number" name="jumlah_nonrakitan" min="0">
                <br><br>
                <button type="submit" name="submit">Beli</button>
            </form>
        </div>
    </section>
        <?php
        if(isset($_POST['submit'])){
            $nama_rakitan_id = $_POST['nama_rakitan_id'];
            $nama_nonrakitan_id = $_POST['nama_nonrakitan_id'];
            $jumlah_rakitan = $_POST['jumlah_rakitan'];
            $jumlah_nonrakitan = $_POST['jumlah_nonrakitan'];
            $harga_rakitan = $furnitures[$nama_rakitan_id]['harga'];
            $harga_nonrakitan = $furnitures[$nama_nonrakitan_id]['harga'];    
            $harga_total_rakitan = $harga_rakitan * $jumlah_rakitan;
            $harga_total_nonrakitan = $harga_nonrakitan * $jumlah_nonrakitan;
            $harga_total = $harga_total_rakitan + $harga_total_nonrakitan; 
            ?>
            <section class="output">            
            <h2>Bukti Pembelian</h2>
            <?php
            echo "Furniture Rakitan : " . $furnitures[$nama_rakitan_id]['nama'] . " (" . $jumlah_rakitan . ")<br>";
            echo "Harga Furniture Rakitan : Rp " . number_format($harga_total_rakitan, 0, ',', '.') . "<br>";
            echo "Furniture Non Rakitan : " . $furnitures[$nama_nonrakitan_id]['nama'] . " (" . $jumlah_nonrakitan . ")<br>";
            echo "Harga Furniture Non Rakitan : Rp " . number_format($harga_total_nonrakitan, 0, ',', '.') . "<br>"; 
            echo "Total Pembayaran <b>RP " . number_format($harga_total, 0, ',', '.') . "</b>";
            }
        ?>
    </section>
</body>
</html>