<?php
    $total_gram;
    $harga_sebelum;
    $diskon;
    $harga_setelah;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No 7 </title>
</head>
<body>
    <h3>Menghitung jumlah uang yang dibayarkan</h3>
    <form action="" method="post">
        <table>
            <tr>
                <td>Total Gram : </td>
                <td><input type="number" name="gram"></td>
                <td><input type="submit" value="hitung" name="submit"></td>
            </tr>
        </table>
    </form>
    <br>
    <?php
        if(isset($_POST['submit'])){
            $total_gram = $_POST['gram'];
            $harga_sebelum = 500 * $total_gram;
            $diskon = 5 * $harga_sebelum / 100;
            $harga_setelah = $harga_sebelum - $diskon;

            echo "Harga Sebelum Diskon = " . $harga_sebelum . "<br>";
            echo "Diskon = " . $diskon . "<br>";
            echo "Harga Setelah Diskon = " . $harga_setelah . "<br>";
        }
    ?>
</body>
</html>    