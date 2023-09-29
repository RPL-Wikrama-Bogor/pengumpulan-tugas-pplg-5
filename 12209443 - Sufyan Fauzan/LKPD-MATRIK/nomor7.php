<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harga</title>
</head>

<body>
    <h1>Harga barang</h1>
    <form method="POST" action="">
        <label for="">Input harga per gram</label>
        <input type="number" name="total_gram"><br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $total_gram = $_POST['total_gram'];

        $harga_sebelum = 500 * $total_gram;
        $diskon = 5 * $harga_sebelum / 100;
        $harga_setelah = $harga_sebelum - $diskon;

        echo "harga sebelum Rp." . number_format($harga_sebelum, '1', ',', '.') . "<br>" .
        " mendapatkan diskon sebesar Rp." . number_format($diskon, '1', ',', '.') . "<br>" . 
        " jumlah yang harus dibayar Rp." . number_format($harga_setelah, '1', ',', '.');
    }
    ?>

</body>

</html>