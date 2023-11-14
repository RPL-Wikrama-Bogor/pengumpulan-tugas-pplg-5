<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesapura.css">
</head>
<body>
    <center>
    <div class="all-container2">
        <div class="container2">
            <form action="" method="post">
                <p class="title2">Menentukan bilangan ratusan,<br>puluhan & satuan</p>
                <input class="rapusa" type="text" name="rapusa" placeholder="Bilangan" autocomplete="off">
                    <br><br>
                <button name="submit" tpye="submit">Kirim</button>
            </form>
        </div>
    </div>

    <?php
    if(isset($_POST["submit"])) {
        if(isset($_POST["rapusa"]) && is_numeric($_POST["rapusa"])) {
            $bilangan = ($_POST["rapusa"]);
            $satuan =  $bilangan % 10;
            $puluhan = ($bilangan / 10) % 10;
            $ratusan  = ($bilangan / 100) % 10;
            
            echo "<p style='font-family: arial; font-size: 17px; margin-top: -90px;'>Satuan: $satuan</p>";
            echo "<p style='font-family: arial; font-size: 17px;'>Puluhan: $puluhan</p>";
            echo "<p style='font-family: arial; font-size: 17px;'>Ratusan: $ratusan</p>";
            
            if($ratusan > 999) {

            }
        }else {
            echo "<p style='color: red; font-size: 15px; margin-top: -60px; font-style: italic;'>Masukan bilangan!</p>";
        }
        }
    ?>
    </center>
</body>
</html>

