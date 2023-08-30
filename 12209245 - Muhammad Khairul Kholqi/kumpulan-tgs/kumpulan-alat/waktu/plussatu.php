<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="all-container">
        <div class="container">
            <form action="" method="post">
                <p class="title">Kalkulator waktu plus 1</p>
                <input class="jam" type="text" name="jam" placeholder="Jam" autocomplete="off">
                    <br><br>
                <input class="menit" type="text" name="menit" placeholder="Menit" autocomplete="off">
                    <br><br>
                <input class="detik" type="text" name="detik" placeholder="Detik" autocomplete="off">
                    <br><br>
                <button name="kirim" tpye="submit">Kirim</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST["kirim"])) {
        if(isset($_POST["jam"]) && is_numeric($_POST["jam"])) {
            if(isset($_POST["menit"]) && is_numeric($_POST["menit"])) {
                if(isset($_POST["detik"]) && is_numeric($_POST["detik"])) {
                    $hh = ($_POST["jam"]);
                    $mm = $_POST["menit"];
                    $ss = ($_POST["detik"]);
                    $ss2 = $ss + 1;

                    if($ss2 >= 60) {
                        $mm = $mm + 1;
                        $ss2 = 00;
                    } if ($mm >= 60) {
                        $hh = $hh + 1;
                        $mm = 00;
                        $ss2 = 00;
                    } if ($hh >= 4) {
                        $hh = 00;
                        $mm = 00;
                        $ss2 = 00;
                    }

                    echo "<p>Jam: $hh</p>";
                    echo "<p>Menit: $mm</p>";
                    echo "<p>Detik: $ss2</p>";
                }
            }
        } else {
            echo "<p style='color: red; font-size: 15px; font-style: italic; margin-top: -150px;'>Masukan jam, menit dan detik!</p>";
        }
    }
?>