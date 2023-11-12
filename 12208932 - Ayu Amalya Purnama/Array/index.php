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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .hal1{
            border:1px solid black;
        }

        h3{
            text-align:center;
        }

        .form-pembelian{
            border:1px solid black;
            padding:10px;
        }

        input[type=submit]{
            width:100%;
        }

        .bill{
            border:1px solid black;
            padding:10px;
        }
    </style>
</head>
<body>
    <div class="hal1">
        <h3>Daftar Furniture I'dea</h3>
        <ol type="1">
            <?php foreach($furnitures as $furniture){ ?>
                <li><?= "Nama Furniture : " . $furniture["nama"]; ?></li>
                    <?= "Harga : " . $furniture["harga"];?>
            <?php } ?>
        </ol>
    </div>
    <br>

    <div class="form-pembelian">
        <form action="" method="post">
                <label for="">Pilih Furniture Rakitan : </label>
                <select name="rakitan" id="rakitan">
                <option hidden disabled selected>---Pilih---</option>   

                <?php foreach($furnitures as $key => $furniture){?>
                    <?php if($furniture['tipe'] == 'rakitan') {?>         
                        <option value="<?= $key ?>"><?= $furniture['nama'] ?></option>                                   
                    <?php } ?>
                <?php } ?>

                </select>
                <br><br>
                
                <label for="">Jumlah Pembelian Furniture Rakitan : </label>
                <input type="number" name="jml_rakitan">
                <br><br>

                <label for="">Pilih Furniture Tidak Rakitan : </label>
                <select name="nonrakitan" id="nonrakitan">
                <option hidden disabled selected>---Pilih---</option>
                    
                <?php foreach($furnitures as $key => $furniture){?>
                    <?php if($furniture['tipe'] == 'non-rakitan') {?>         
                        <option value="<?= $key ?>"><?= $furniture['nama'] ?></option>                                   
                    <?php } ?>
                <?php } ?>

                </select>
                <br><br>
    
                <label for="">Jumlah Pembelian Furniture Tidak Rakitan : </label>
                <input type="number" name="jml_nonrakitan">
                <br><br>
                <center><input type="submit" value="Beli" name="submit"></center>
        </form>
    </div>
    <br>

        <?php 
    
            if(isset($_POST['submit'])){

                    if(isset($_POST['rakitan']) && isset($_POST['jml_rakitan'])){
                        $rakitan_id = $_POST['rakitan'];
                        $jml_rakitan = $_POST['jml_rakitan'];
                        $barang_rakitan = $furnitures[$rakitan_id]['nama'];
                        $harga_rakitan =  $furnitures[$rakitan_id]['harga'];
                        $totalharga_rakitan = $jml_rakitan * $harga_rakitan;

                    } else{
                        $jml_rakitan = 0;
                        $barang_rakitan = NULL;
                        $harga_rakitan = 0;
                        $totalharga_rakitan = 0;

                    }

                    if(isset($_POST['nonrakitan']) && isset($_POST['jml_nonrakitan'])){
                        $nonrakitan_id = $_POST['nonrakitan'];
                        $jml_nonrakitan = $_POST['jml_nonrakitan'];
                        $barang_nonrakitan = $furnitures[$nonrakitan_id]['nama'];
                        $harga_nonrakitan =  $furnitures[$nonrakitan_id]['harga'];
                        $totalharga_nonrakitan = $jml_nonrakitan * $harga_nonrakitan;

                    } else{
                        $jml_nonrakitan = 0;
                        $barang_nonrakitan = NULL;
                        $harga_nonrakitan = 0;
                        $totalharga_nonrakitan = 0;
        ?>
                <?php  } ?>
                
                <div class="bill">
                    <h3>Bukti Pembelian</h3>
                    <p>Furniture Rakitan : <?= $barang_rakitan ?> (<?= $jml_rakitan ?>)</p>
                    <p>Harga Furniture Rakitan : <?= $harga_rakitan ?></p>
                    <p>Furniture non Rakitan : <?= $barang_nonrakitan ?> (<?= $jml_nonrakitan ?>)</p>
                    <p>Harga Furniture non Rakitan : <?= $harga_nonrakitan ?></p>
                    <p>Total Pembayaran : <?= $totalharga_rakitan + $totalharga_nonrakitan ?></p>
                </div>
            <?php } ?>
            
</body>

</html>



