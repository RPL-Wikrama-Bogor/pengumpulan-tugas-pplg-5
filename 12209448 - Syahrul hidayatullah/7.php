<?php

$total_gram = 0;
$harga_sebelum = 0;
$diskon = 0;
$harga_setelah = 0;

if (isset($_POST['total_gram'])) {
    $total_gram = $_POST['total_gram'];
    $harga_sebelum = 500 * $total_gram;
    $diskon = 17; //contoh
    $harga_setelah = $harga_sebelum - ($harga_sebelum * $diskon / 100);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskon</title>
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Berat (gram) </td>
                <td><input type="number" name="total_gram"></td>
            </tr>
            <tr>
                <td><input type="submit" value="submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php
if ($total_gram > 0) {
    echo "Harga sebelum diskon : $harga_sebelum <br>";
    echo "Dan harga setelah diskon : $harga_setelah";
}
?>