<?php
    $hh;
    $mm;
    $ss;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 12</title>
    <style>
        body{
            margin: 10px 15rem;
            background-color: #D8C4B6;
        }
        h2{
            text-align: center;
            background-color: #F5EFE7;
            margin: 10px;
            padding: 3rem 7rem;
            border-radius: 10px;
        }

        form{
            padding: 30px;
            margin: 20px 10px;
            background-color: #F5EFE7;
            border-radius: 10px;
            align: center;
        }
        .isi{
            background-color:  #F5EFE7;
            margin: 20px 10px;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Waktu</h2>

    <form method="post" action="#">
        <table>
            <tr>
                <td>Jam <input type="number" name="hh"></td>
                <td>Menit <input type="number" name="mm"></td>
                <td>Detik <input type="number" name="ss"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="selanjutnya"></td>
            </tr>
        </table>
    </form>

    <?php
        if (isset($_POST['submit'])) {
            $hh = $_POST["hh"];
            $mm = $_POST["mm"];
            $ss = $_POST["ss"];

            $ss = $ss + 1;

            if ($ss >=60) {
                $mm = $mm + 1;
                $ss = 0 . 0;

                if ($mm >= 60) {
                    $hh = $hh + 1;
                    $mm = 0 . 0;
    
                    if ($hh >=24) {
                        $hh = 0 . 0;
                        $mm = 0 . 0;
                        $ss = 0 . 0;
                    }
                }
            }
    ?>
    <div class="isi">
        <?php
            echo " Pukul $hh: $mm: $ss";
        }
        ?>
    </div>
    
</body>
</html>