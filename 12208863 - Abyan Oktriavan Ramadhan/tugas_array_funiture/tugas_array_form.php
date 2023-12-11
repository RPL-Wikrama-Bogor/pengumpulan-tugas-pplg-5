<?php 
$barang = [
    [
        'nama' => 'rak piring 100cm x 200cm',
        'harga' => 300000,
        'tipe' => 'rakitan'
    ],
    [
        'nama' => 'Meja belajar',
        'harga' => 150000,
        'tipe' => 'non-rakitan'
    ],
    [
        'nama' => 'kursi taman 2 seater',
        'harga' => 270000,
        'tipe' => 'non-rakitan'
    ],
    [
        'nama' => 'lemari panjang 5 susun',
        'harga' => 497000,
        'tipe' => 'rakitan'
    ],
    [
        'nama' => 'meja rias tipe jepang',
        'harga' => 50000,
        'tipe' => 'non-rakitan'
    ],
    [
        'nama' => 'ranjang bayi',
        'harga' => 450000,
        'tipe' => 'rakitan'
    ],
];

    if($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST)) {
        echo "Harus mengisi form terlebih dahulu";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko berkembang</title>
    <style>
        .atas{
            border: 2px solid;
        }
        .atas h1{
            margin: 20px;
        }
        .atasheader{
            display: flex;
            justify-content: center;
        }
        .containerForm{
            margin: 20px;
            border: 2px solid;
        }
        .buktiPembayaran{
            border: 2px solid;
        }
    </style>
</head>
<body>
   <div class="atas">
    <h1>List Barang</h1>
       <ol> 
       <?php foreach($barang as $b) { ?>
           <li><?= "nama barang : ". $b['nama']."<br>". "Harga : ".number_format($b['harga'], 2, ".", "."). " Rp"?></li> <?php } ?>
       </ol>
   </div>
    <div class="containerForm">
        <form action="" method="post">
            <select name="rakitan" id="rakitan">
                <option value=""  hidden selected>-- rakitan --</option>
                <?php foreach($barang as $barangs => $index) { ?>
                    <?php if($index['tipe'] == 'rakitan') {?>
                        <option value="<?= $barangs ?>"><?= $index['nama']?></option>
                        <?php }?>
                <?php }?>
            </select>
            <br>
            <input type="number" name="jumlahRakitan" placeholder="berapa yang ingin di beli?" required>
            <br>
            <select name="non-rakitan" id="non-rakitan">
                <option value="" disabled hidden selected>-- non-rakitan --</option>
                <?php foreach($barang as $barangs => $index) { ?>
                    <?php if($index['tipe'] == 'non-rakitan') {?>
                        <option value="<?= $barangs ?>"><?= $index['nama']?></option>
                        <?php }?>
                <?php };?>
            </select>
            <br>
            <input type="number" name="jumlah-nrakitan" placeholder="berapa yang ingin di beli?" required>
            <br>
            <button type="input" name="input">beli</button>
            <?php 
            
            ?>
        </form>
    </div>
        <?php 

    if(isset($_POST['input'])){   
            $rakitan = $_POST['rakitan'];
            $nonRakitan = $_POST['non-rakitan'];
                if($rakitan == '' || $nonRakitan == ''){
                    echo "ini terlebih dahulu";
                }else{
                $jumlahr = $_POST['jumlahRakitan'];
                $jumlahn = $_POST['jumlah-nrakitan'];
                $rakitann = $barang[$rakitan]['nama'];
                $norakit = $barang[$nonRakitan]['nama'];
                $hargaRakit = $barang[$rakitan]['harga'];
                $hargaNorakit = $barang[$nonRakitan]['harga'];
                $totalRakit = $hargaRakit * $jumlahr;
                $totalNrakit = $hargaNorakit * $jumlahn;
                $hargaTotal = $totalNrakit + $totalRakit;
                
                "barang rakitan : ". $rakitann. " (".$jumlahr. ") <br>";
                "harga barang rakitan : " . $totalRakit;
                "<br>";
                "barang non rakitan : ". $norakit." (". $jumlahn . ") <br>";
                "harga barang non rakitan : " . $totalNrakit;
        
        ?>
        <div class="buktiPembayaran">
        <p>barang rakitan :<?= $rakitann. " (". $jumlahr. ")"?></p>
        <p>harga barang rakitan : <?= $totalRakit ?></p>
        <p>barang non rakitan : <?= $norakit . " (". $jumlahn . ") " ?></p>
        <p>Harga barang non rakitan : <?= $totalNrakit?></p>
        <p>total harga : <?= $hargaTotal ?></p>

        <?php  }
        } ?>

        </div>
   
</body>
</html>