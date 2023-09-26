<?php

$bil1;
$bil2;
$bil3;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mencari bilangan terbesar</title>
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Bilangan 1</td>
                <td>:</td>
                <td><input type="text" name="bil1"></td>
            </tr>
            <tr>
                <td>Bilangan 2</td>
                <td>:</td>
                <td><input type="text" name="bil2"></td>
            </tr>
            <tr>
                <td>Bilangan 3</td>
                <td>:</td>
                <td><input type="text" name="bil3"></td>
            </tr>
            <td><input type="submit" value="cari" name="submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {

    $bil1 = $_POST["bil1"];
    $bil2 = $_POST["bil2"];
    $bil3 = $_POST["bil3"];

    if ($bil1 > $bil2 && $bil1 > $bil3) {
        echo "Bilangan terbesar: " . $bil1;
    } elseif ($bil2 > $bil1 && $bil2 > $bil3) {
        echo "Bilangan terbesar: " . $bil2;
    } elseif ($bil3 > $bil1 && $bil3 > $bil2) {
        echo "Bilangan terbesar: " . $bil3;
    } else {
        if ($bil1 == $bil2 && $bil2 == $bil3) {
            echo "Semua bilangan sama: " . $bil1;
        } elseif ($bil1 == $bil2) {
            echo "Dua bilangan terbesar sama: " . $bil1;
        } elseif ($bil1 == $bil3) {
            echo "Dua bilangan terbesar sama: " . $bil1;
        } elseif ($bil2 == $bil3) {
            echo "Dua bilangan terbesar sama: " . $bil2;
        } else {
            echo "sama";
        }
    }
}