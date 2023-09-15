<?php
$furnitures = [
    [
        "nama" => "Rak piring 100cm X 200cm",
        "harga" => 300000,
        "tipe" => "rakitan"
    ],
    [
        "nama" => "Meja belajar",
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
?>
<style>
    body{
        background-color:F6F4EB;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>purnitur</title>
</head>
<body>
    <form action="" method="post">
    <center><div style="background-color:white;border:2px solid black;width:500px;text-align:left;padding-left:20px;">
    <h2>Daftar Furnitur Ih'Sebel</h2>
    
        <?php
        $no=1;
        foreach ($furnitures as $key) {
            echo $no++,". Nama furniture :",$key['nama']."<br>";
            echo "Harga: RP.".number_format($key['harga'],2)."<br>";
          
        }
        ?>
        </div>
        </center> <br>

<center> 
<div style="background-color:white;width:500px;height:200px;border:2px solid black;">

        <select name="fur" style="width:200px;margin-top:10px;">
            <option disabled selected hidden>Pilih furnitur rakitan</option>
            <?php
            foreach($furnitures as $key => $item){
                if($item['tipe'] == "rakitan"){
            ?>
            <option value="<?= $key ?>"><?= $item['nama'] ?></option>
            <?php } }?>
        </select><br><br>

        <input type="number" name="rakitan" placeholder="Jumlah pembelian furnitur rakitan" style="width:200px;"><br><br>

        <select name="nonrak" style="width:200px;">
            <option disabled selected hidden>Pilih furnitur non-rakitan</option>
            <?php
            foreach($furnitures as $key => $item){
             if($item['tipe'] == "non-rakitan") { ?>
            <option value="<?= $key ?>"><?= $item['nama'] ?></option>
            <?php } }?>
        </select><br><br> 
        <input type="number" name="non" placeholder="Jumlah pembelian non-rakitan" style="width:200px;" ><br><br>

        <button type="submit" name="submit" style="width:400px;">Beli</button>
    
       </center>
    </div><br>
    </form>

    <?php
    if(isset($_POST['submit'])){
        $fur = $_POST['fur'];
        $rakitan = $_POST['rakitan'];
        $nonrakIndex = $_POST['nonrak'];
        $non = $_POST['non'];
        $furNama = $furnitures[$fur]['nama'];
        $nonrakNama = $furnitures[$nonrakIndex]['nama'];
        $furharga = $furnitures[$fur]['harga']*$rakitan;
        $nonharga = $furnitures[$nonrakIndex]['harga']*$non;
        $total=$furharga+$nonharga;
        
        
         echo "<center>";
        echo "<div style='background-color:white;border:2px solid black;width:500px;height:185px;'>";   
        echo "<h2>Bukti Pembelian</h2>";
        echo "Anda telah membeli furnitur rakitan: " . $furNama . "<br>";
        echo "Jumlah pembelian furnitur rakitan dengan harga: RP." . number_format($furharga,2) . "<br>";
        echo "Anda telah membeli furnitur non-rakitan: " . $nonrakNama . "<br>";
        echo "Jumlah pembelian furnitur non-rakitan: RP." . number_format($nonharga,2) . "<br>";
        echo "Total pembayaran: RP.<b>". number_format($total,2) ."<b>";
        echo "</center>";
        echo "</div>";
    }
    ?>
</body>
</html>
