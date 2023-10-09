<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesuhu.css">
</head>
<body>
    <center>
    <div class="container2">
        <form action="" method="post">
            <P class="title2">Menentukan suhu</P>
            <input class="input-suhu" type="text" name="suhu" placeholder="Ketik.." autocomplete="off">
                <br><br>
            <button type="submit" name="submit">Konversi</button>
        </form>
    </div>

    <?php
    if(isset($_POST["submit"])) {
        if(isset($_POST["suhu"]) && is_numeric($_POST["suhu"])) {
            $suhu = ($_POST["suhu"]);
            $celcius = ($suhu - 32) / 1.8;

            if($suhu >= 30) {
                echo "<p style='font-family: arial; font-size: 17px; margin-top: -90px;'>Suhu Panas</p>";
            } else if($suhu <= 25 && $suhu >= 20) {
                echo "<p style='font-family: arial; font-size: 17px;'>Suhu Normal</p>";
            } else {
                echo "<p style='font-family: arial; font-size: 17px;'>Suhu Dingin</p>";
            }
        } else {
            echo "<p style='color: red; font-size: 15px; margin-top: -60px; font-style: italic;'>Masukan suhu!</p>";
        }
    }
    ?>
    </center>
</body>
</html>

