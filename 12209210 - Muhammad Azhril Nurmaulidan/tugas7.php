<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung Harga Buah Jeruk</title>
</head>
<body>
<form action="#" method="post" name="formBerat">
    Berat Buah Jeruk (gram) <br> <input type="text" name="berat_jeruk"> <br><br>
    <input type="submit" name="submit"><br><br>
</form>

<?php
if(isset($_POST['submit'])) {
    $berat_jeruk = isset($_POST['berat_jeruk']);
    $harga_per_kg = 500;
    $diskon = 0.05;

    $harga_sebelum = ($berat_jeruk / 100) * $harga_per_kg;
    $jumlah_diskon = $harga_sebelum * $diskon;
    $harga_setelah = $harga_sebelum - $jumlah_diskon;

    echo "Berat Buah Jeruk: $berat_jeruk gram<br>";
    echo "Harga Sebelum : $harga_sebelum<br>";
    echo "Diskon ($diskon%): $jumlah_diskon<br>";
    echo "Harga Setelah : $harga_setelah";
}
?>

</body>
</html>
