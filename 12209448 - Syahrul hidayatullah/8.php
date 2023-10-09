<?php

if (isset($_POST['submit'])) {
    $bilangan = $_POST['bilangan'];

    $ratusan = floor(($bilangan / 100) % 10);
    $puluhan = floor(($bilangan / 10) % 10);
    $satuan = $bilangan % 10;

    echo "Ratusan: $ratusan <br>";
    echo "Puluhan: $puluhan <br>";
    echo "Satuan: $satuan";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilihan Bilangan</title>
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Bilangan</td>
                <td>:</td>
                <td><input type="number" name="bilangan"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>

</body>

</html>