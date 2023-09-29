<?php

$jam;
$menit;
$detik;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Jam</td>
                <td><input type="number" name="jam" maxlength="2" onKeyPress="if( this.value.length == 2 ) return false;"></td>
            </tr>
            <tr>
                <td>Menit</td>
                <td><input type="number" name="menit" maxlength="2" onKeyPress="if( this.value.length == 2 ) return false;"></td>
            </tr>
            <tr>
                <td>Detik</td>
                <td><input type="number" name="detik" maxlength="2" onKeyPress="if( this.value.length == 2 ) return false;" ></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php

if (isset($_POST['submit'])) {
    $jam = $_POST['jam'];
    $menit = $_POST['menit'];
    $detik = $_POST['detik'];

    $total_detik = ($jam * 3600) + ($menit * 60) + $detik;

    echo "Total detik: $total_detik detik";
}