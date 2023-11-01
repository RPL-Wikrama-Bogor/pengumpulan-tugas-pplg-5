<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylewaktu2.css">
</head>
<body>
<center>
    <div class="all-container">
        <div class="container">
            <form action="" method="post">
                <p class="title">Kalkulator hitung detik</p>
                <input class="jam" type="text" name="jam" placeholder="Jam" autocomplete="off">
                    <br><br>
                <input class="menit" type="text" name="menit" placeholder="Menit" autocomplete="off">
                    <br><br>
                <input class="detik" type="text" name="detik" placeholder="Detik" autocomplete="off">
                    <br><br>
                <button name="kirim" tpye="submit">Kirim</button>
                    <br><br>
                <button><a href="detiktojam.php">Konversi detik ke jam-menit</a></button>
                    <br><br>
                <button><a href="plussatu.php">Menambahkan 1 dertik</a></button>
            </form>
        </div>
    </div>

<?php
    if(isset($_POST["kirim"])) {
        if(isset($_POST["jam"]) && is_numeric($_POST["jam"])) {
            if(isset($_POST["menit"]) && is_numeric($_POST["menit"])) {
                if(isset($_POST["detik"]) && is_numeric($_POST["detik"])) {
                    $jam = ($_POST["jam"]);
                    $menit = ($_POST["menit"]);
                    $detik = ($_POST["detik"]);

                    $jam1 = $jam * 3600;
                    $menit1 = $menit * 60;
                    $total_detik = $jam1 + $menit1 + $detik;
                    
                    echo "<p style='font-family: arial; font-weight: bold; font-size: 17px; margin-top: -150px;'>$total_detik Detik</p>";
                }
            }
        } else {
            echo "<p style='color: red; font-size: 15px; font-style: italic; margin-top: -150px;'>Masukan jam, menit dan detik!</p>";
        }
    }
?>
</center>
</body>
</html>

