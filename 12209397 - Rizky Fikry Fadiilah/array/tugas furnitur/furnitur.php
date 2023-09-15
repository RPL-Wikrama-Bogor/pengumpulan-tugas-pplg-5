<?php
$furnitur = [
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>purnitur</title>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select, input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        hr {
            border: 1px solid #ccc;
        }

        .receipt {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .receipt h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Your HTML form here -->
</body>
</html>

</head>
<body>
    <form action="" method="post">
    
    <h2>Daftar Furnitur</h2>
    <div style="text-align:center">
        <?php
        $no=1;
        foreach ($furnitur as $key) {
            echo $no++,". Nama furniture :",$key['nama']."<br>";
            echo "Harga: ".number_format($key['harga'])."<br>";
          
        }
        ?>
        </div>
        
<hr>  

        <select name="fur" style="width:200px;">
            <option disabled selected hidden>Pilih furnitur rakitan</option>
            <?php
            foreach($furnitur as $key => $item){
                if($item['tipe'] == "rakitan"){
            ?>
            <option value="<?= $key ?>"><?= $item['nama'] ?></option>
            <?php } }?>
        </select><br><br>

        <input type="number" name="rakitan" placeholder="Jumlah pembelian furnitur rakitan" style="width:200px;"><br><br>

        <select name="nonrak" style="width:200px;">
            <option disabled selected hidden>Pilih furnitur non-rakitan</option>
            <?php
            foreach($furnitur as $key => $item){
             if($item['tipe'] == "non-rakitan") { ?>
            <option value="<?= $key ?>"><?= $item['nama'] ?></option>
            <?php } }?>
        </select><br><br> 
        <input type="number" name="non" placeholder="Jumlah pembelian non-rakitan" style="width:200px;" ><br><br>

        <button type="submit" name="submit" style="width:200px;">Beli</button>
    
       
    </form>

    <?php
    if(isset($_POST['submit'])){
        $fur = $_POST['fur'];
        $rakitan = $_POST['rakitan'];
        $nonrakIndex = $_POST['nonrak'];
        $non = $_POST['non'];
        $furNama = $furnitur[$fur]['nama'];
        $nonrakNama = $furnitur[$nonrakIndex]['nama'];
        $furharga = $furnitur[$fur]['harga']*$rakitan;
        $nonharga = $furnitur[$nonrakIndex]['harga']*$non;
       
        echo "<hr>";
        echo "<center>";
        echo "<h2>Bukti Pembelian</h2>";
        echo "Anda telah membeli furnitur rakitan: " . $furNama . "<br>";
        echo "Jumlah pembelian furnitur rakitan dengan harga: " . number_format($furharga) . "<br>";
        echo "Anda telah membeli furnitur non-rakitan: " . $nonrakNama . "<br>";
        echo "Jumlah pembelian furnitur non-rakitan: " . number_format($nonharga) . "<br>";
        echo "</center>";
    }
    ?>
</body>
</html>