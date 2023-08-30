<?php
    $total_gram;
    $hrg_sblm;
    $diskon;
    $hrg_stlh;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 7</title>
</head>
<body>
    <h2>Menghitung Diskon</h2>

    <form method="post" action="#">
        <table>
            <tr>
                <td>Total Gram</td>
                <td>  :  </td>
                <td><input type="text" name="total_gram"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Harga"></td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $total_gram = $_POST['total_gram'];

        $hrg_sblm = 500 * $total_gram / 100;
        $diskon = 5 * $hrg_sblm / 100;
        $hrg_stlh = $hrg_sblm - $diskon;

        echo $hrg_sblm;
        echo "<br>";
        echo $diskon;
        echo "<br>";
        echo $hrg_stlh;
    }
    ?>
</body>
</html>