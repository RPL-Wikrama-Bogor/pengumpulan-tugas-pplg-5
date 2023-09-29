<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylebarang.css">
</head>
<body>
<center>
    <div class="all-container">
        <div class="container">
            <form action="" method="post">
                <p class="title">Kalkulator hitung harga<br>barang</p>
                <input class="disk-gram" type="text" name="gram" placeholder="Gram" autocomplete="off">
                    <br><br>
                <button name="submit" tpye="submit">Kirim</button>
            </form>
        </div>
    </div>
<?php
    if(isset($_POST["submit"])) {
        if(isset($_POST["gram"]) && is_numeric($_POST["gram"])) {
            $gram_barang = ($_POST["gram"]);
            $harga_sebelum = 500 * $gram_barang;
            $diskon = 5 * $harga_sebelum / 100;
            $harga_setelah = $harga_sebelum - $diskon;

            echo "<p style='font-family: arial; font-size: 17px; margin-top: -90px;'>Harga sebelum: $harga_sebelum</p>";
            echo "<p style='font-family: arial; font-size: 17px;'>Diskon: $diskon</p>";
            echo "<p style='font-family: arial; font-size: 17px;'>Harga setelah diskon: $harga_setelah</p>";
        } else {
            echo "<p style='color: red; font-size: 15px; margin-top: -60px; font-style: italic;'>Masukan gram!</p>";
        }
    }
?>
</center>
</body>
</html>

