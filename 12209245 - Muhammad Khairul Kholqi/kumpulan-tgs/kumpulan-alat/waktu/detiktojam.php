<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styletojam.css">
</head>
<body>
    <center>
    <div class="all-container2">
        <div class="container2">
            <form action="" method="post">
                <p class="title2">Konfersi detik ke jam dan menit</p>
                <input class="konf-detik" type="text" name="konf-detik" placeholder="Detik" autocomplete="off">
                    <br><br>
                <button name="submit" tpye="submit">Kirim</button>
            </form>
        </div>
    </div>

    <?php
        if(isset($_POST["submit"])) {
            if(isset($_POST["konf-detik"]) && is_numeric($_POST["konf-detik"])) {
                $detik = ($_POST["konf-detik"]);

                $jam = (int) ($detik / 3600);
                $detik_sisa = $detik % 3600;
                $menit = (int) ($detik_sisa / 60);
                $detik_sisa = $detik_sisa % 60;
        
                echo "<p style='font-family: arial; font-weight: bold; font-size: 17px; margin-top: -100px;'>$jam Jam</p>";
                echo "<p style='font-family: arial; font-weight: bold; font-size: 17px;'>$menit Menit</p>";
                echo "<p style='font-family: arial; font-weight: bold; font-size: 17px;'>$detik_sisa Detik</p>";

            } else {
                echo "<p style='color: red; font-size: 15px; margin-top: -60px; font-style: italic;'>Masukan angka detik!</p>";
            }
        }
    ?>
    </center>
</body>
</html>