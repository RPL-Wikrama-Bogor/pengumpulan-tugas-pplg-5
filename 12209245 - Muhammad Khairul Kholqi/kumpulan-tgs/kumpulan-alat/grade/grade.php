<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylegrade.css">
</head>
<body>
    <center>
    <div class="all-container">
        <div class="container">
            <form action="" method="post">
                <p class="title">Kalkulator hitung grade</p>
                <input class="jam" type="text" name="pabp" placeholder="Nilai PABP" autocomplete="off">
                    <br><br>
                <input class="menit" type="text" name="mtk" placeholder="Nilai MTK" autocomplete="off">
                    <br><br>
                <input class="detik" type="text" name="dpk" placeholder="Nilai DPK" autocomplete="off">
                    <br><br>
                <button name="kirim" tpye="submit">Kirim</button>
            </form>
        </div>
    </div>
    <?php
    if(isset($_POST["kirim"])) {
        if(isset($_POST["pabp"]) && is_numeric($_POST["pabp"])) {
            if(isset($_POST["mtk"]) && is_numeric($_POST["mtk"])) {
                if(isset($_POST["dpk"]) && is_numeric($_POST["dpk"])) {
                    $pabp = ($_POST["pabp"]);
                    $mtk = ($_POST["mtk"]);
                    $dpk = ($_POST["dpk"]);
                    $rata_rata = ($pabp + $mtk + $dpk) /3;

                    if($rata_rata >= 80 && $rata_rata <= 100) {
                        echo "<p style='font-family: arial; font-size: 17px; margin-top: -70px;'>Nilai A</p>";
                    } else if ($rata_rata >= 75 && $rata_rata < 80) {
                        echo "<p style='font-family: arial; font-size: 17px; margin-top: -70px;'>Nilai B</p>";
                    } else if ($rata_rata >= 65 && $rata_rata <75) {
                        echo "<p style='font-family: arial; font-size: 17px; margin-top: -70px;'>Nilai C</p>";
                    } else if ($rata_rata >= 45 && $rata_rata < 65) {
                        echo "<p style='font-family: arial; font-size: 17px; margin-top: -70px;'>Nilai D</p>"; 
                    } else if ($rata_rata >= 0 && $rata_rata < 45) {
                        echo "<p style='font-family: arial; font-size: 17px; margin-top: -70px;'>Nilai E</p>";
                    } else {
                        echo "<p style='font-family: arial; font-size: 17px; margin-top: -70px;'>Nilai K</p>";
                    }
                }
            }
        } else {
            echo "<p style='color: red; font-size: 15px; font-style: italic; margin-top: -50px;'>Masukan Nilai!</p>";    
        }
    }
    ?>
    </center>
</body>
</html>

