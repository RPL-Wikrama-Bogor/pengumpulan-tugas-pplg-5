<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
            <label for="hh">Input HH:</label>
            <br>
            <input type="number" name="hh" id="hh">
            <br>
            <label for="mm">Input MM:</label>
            <br>
            <input type="number" name="mm" id="mm">
            <br>
            <label for="ss">Input SS:</label>
            <br>
            <input type="number" name="ss" id="ss">
            <br>
            <button name="submit" id="submit">Kirim</button>
        </form>
        <?php
if (isset($_POST['submit'])) {
    if(isset($_POST["hh"]) && is_numeric($_POST["hh"])) {
        (isset($_POST["mm"]) && is_numeric($_POST["mm"])) {
            (isset($_POST["ss"]) && is_numeric($_POST["ss"])) {
                $hh = $_POST['hh'];
    $mm = $_POST['mm'];
    $sss = $_POST['ss'];

    $ss = $sss +1;

    if ($ss>=60) {
        $mm= $mm +1;
        $ss= 00;
    }
    if ($mm>=60) {
        $hh= $hh +1;
        $mm= 00;
        $ss = 00;
    }
    if ($hh>= 24) {
        $hh= 00;
        $mm= 00;
        $ss= 00;
    }

?>
    <h1>Hasil Penambahan</h1>
    <table border="1">
        <tr>
            <th>Data Waktu Sebelum</th>
            <th>Setelah Penambahan 1 detik</th>
        </tr>
        <tr>
            <td><?= $hh . " : " . $mm . " : " . $sss;?></td>
            <td><?= $hh . " : " . $mm . " : " . $ss;?></td>
        </tr>
    </table>
    <?php
    }else {
        echo ".";

            }
        }
    }
    }
    ?>
</body>
</html>