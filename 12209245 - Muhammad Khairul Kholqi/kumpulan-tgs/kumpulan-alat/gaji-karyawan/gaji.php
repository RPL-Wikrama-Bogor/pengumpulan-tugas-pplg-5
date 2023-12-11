<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylegaji.css">
</head>
<body>
<center>
    <div class="all-container">
        <div class="container">
            <form action="" method="post">
                <p class="title">Kalkulator hitung gaji</p>
                <input class="name" type="text" name="namekaryawan" placeholder="Nama" autocomplete="off">
                    <br><br>
                <input class="gaji" type="text" name="gajikaryawan" placeholder="Gaji karyawan" autocomplete="off">
                    <br><br>
                <button name="kirim" tpye="submit">Kirim</button>
            </form>
        </div>
    </div>
<?php
    if(isset($_POST["kirim"])) {
        if(isset($_POST["namekaryawan"]) && is_string($_POST["namekaryawan"])) {
            if(isset($_POST["gajikaryawan"]) && is_numeric($_POST["gajikaryawan"])) {
                $nama = ($_POST["namekaryawan"]);
                $gaji_pokok = ($_POST["gajikaryawan"]);
                $tunjangan = (20 * $gaji_pokok) / 100;
                $pajak = (15 * ($gaji_pokok + $tunjangan)) / 100;
                $gaji_bersih = $gaji_pokok + $tunjangan - $pajak;

                echo "<p style='font-family: arial; font-size: 17px; margin-top: -100px'>Nama: $nama</p>";
                echo "<p style='font-family: arial; font-size: 17px;'>Tunjangan: $tunjangan</p>";
                echo "<p style='font-family: arial; font-size: 17px;'>Pajak: $pajak</p>";
                echo "<p style='font-family: arial; font-size: 17px;'>Gaji bersih: $gaji_bersih<p/>"; 
            } else {
                echo "<p style='color: red; font-size: 15px; margin-top: -60px; font-style: italic;'>Masukan nama karyawan!</p>";   
                echo "<p style='color: red; font-size: 15px; margin-top: -50px; font-style: italic;'>Masukan gaji karyawan!</p>";
            }
        }
    }
?>
</center>
</body>
</html>






