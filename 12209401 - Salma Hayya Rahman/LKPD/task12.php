<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/task12.css">
</head>
<body>
    <div class="form">
    <form action="" method="post">
        <div class="title">Welcome<br><span>Silahkan Masukan Waktu</span></div>
        <input  class="input" type="number" name="jam" id="" placeholder="jam">
        <input  class="input" type="number" name="menit" id="" placeholder="menit">
        <input  class="input" type="number" name="detik" id="" placeholder="detik"><br><br>
        <input  class="button-confirm" type="submit" value="submit">
    </form>
    <?php
    if ($_SERVER ['REQUEST_METHOD'] == "POST") {
        $hh = $_POST['jam'] ;
        $mm = $_POST['menit'] ;
        $ss = $_POST['detik'] ;

        $ss = $ss + 1 ;
        if ($ss >=  60) {
            $mm = $mm + 1 ;
            $ss = $ss ;
            if ($mm >= 60) {
                $hh = $hh + 1 ;
                $mm = 00 ;
                $ss = 00 ;
            }if ($hh >= 24) {
                $hh = 00 ;
                $mm = 00 ;
                $ss = 00 ;
            }
        }?>
        <div class="card">
        <?php
        echo "$hh jam $mm menit $ss detik" ;
        }?>
        </div>
    <?php ?>
</div>
</body>
</html>

