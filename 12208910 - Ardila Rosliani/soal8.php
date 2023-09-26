<?php
    $bilangan;
    $satuan;
    $puluhan;
    $ratusan;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 8</title>
</head>
<body>
    <h2>Mengkoverensi Bilangan Bulat Menjadi Ratusan, Puluhan, dan Satuan</h2>

    <form method="post" action="">
        <tr>
            <td> Masukan Bilangan</td>
            <td>  :  </td>
            <td><input type="number" name="bilangan"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="hitung"></td>
        </tr>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $bilangan = $_POST['bilangan'];

        $satuan = $bilangan % 10;
        $puluhan = ($bilangan / 10) % 10;
        $ratusan = ($bilangan / 100) % 100;

        echo "satuan $satuan <br>";
        echo "puluhan $puluhan <br>";
        echo "ratusan $ratusan";

    }
    ?>
    
</body>
</html>