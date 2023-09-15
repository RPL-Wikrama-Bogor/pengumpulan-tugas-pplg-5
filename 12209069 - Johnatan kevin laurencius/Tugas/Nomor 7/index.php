<?php
    $total_gram = 0;
    $harga_sebelum = 0;
    $diskon = 0;
    $harga_setelah = 0;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor 7</title>
</head>
<body>
    <form action="" method="post">
        <label for="total_gram"> Total gram</label>
        <input type="number" name="total_gram">
        <input type="submit" name="submit">
    </form>

    <?php
        if(isset($_POST['submit'])) {
            $total_gram = $_POST['total_gram'];

            $harga_sebelum = 500 * $total_gram;
            $diskon = 5 * $harga_sebelum / 100;
            $harga_setelah = $harga_sebelum - $diskon;

            echo "<p> Harga Sebelum: $harga_sebelum <br> Diskon: $diskon <br> Harga Setelah: $harga_setelah</p>";
        }
    ?>
</body>
</html>