
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <label for="totaldetik">
        <input type="number" name="total_gram"><br><br>
        
            <button name="submit">Submit</button> <br>

    </form>
</body>

<?php

if (isset($_POST['submit'])) {
    # code...

$total_gram;
$harga_sebelum;
$diskon;
$harga_setelah;

$total_gram = $_POST['total_gram'];
$harga_sebelum = 500 * $total_gram/100;
$diskon = 5 * $harga_sebelum /100;
$harga_setelah = $harga_sebelum - $diskon;

echo $harga_sebelum . "<br>";
echo "potongan harga 5% dari harga awal = ". $diskon . "<br>";
echo $harga_setelah . "<br>";

}
// ?>