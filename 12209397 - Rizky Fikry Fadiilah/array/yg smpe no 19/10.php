<?php

$pabp = 0;
$mtk = 0;
$dpk = 0;
$rata = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nyari nilai</title>
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>PABP</td>
                <td>:</td>
                <td><input type="text" name="pabp"></td>
            </tr>
            <tr>
                <td>MTK</td>
                <td>:</td>
                <td><input type="text" name="mtk"></td>
            </tr>
            <tr>
                <td>DPK</td>
                <td>:</td>
                <td><input type="text" name="dpk"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $pabp = $_POST['pabp'];
    $mtk = $_POST['mtk'];
    $dpk = $_POST['dpk'];
    $rata = ($pabp + $mtk + $dpk) / 3;

    if ($rata <= 100 && $rata >= 80) {
        echo "A";
    } elseif ($rata < 80 && $rata >= 75) {
        echo "B";
    } elseif ($rata < 75 && $rata >= 65) {
        echo "C";
    } elseif ($rata < 65 && $rata >= 45) {
        echo "D";
    } elseif ($rata < 45 && $rata >= 0) {
        echo "E";
    } else {
        echo "g sesuai";
    }
}

?>