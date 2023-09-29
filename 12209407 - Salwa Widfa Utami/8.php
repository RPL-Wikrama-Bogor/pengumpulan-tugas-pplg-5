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
    <title>No 8</title>
</head>
<body>
    <h2>Mencari angka satuan-puluhan-ratusan</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td>Bilangan : </td>
                <td><input type="number" name="bilangan"></td>
                <td><input type="submit" value="submit" name="submit"></td>
            </tr>
        </table>
    </form>
    <br>

    <?php
        if(isset($_POST['submit'])){
            $bilangan = $_POST['bilangan'];

            $satuan = $bilangan % 10;
            $puluhan = floor (($bilangan / 10) % 10);
            $ratusan = floor (($bilangan / 100));

            echo "Bilangan : " . $bilangan . "<br>";
            echo "Ratusan : " . $ratusan . "<br>";
            echo "Puluhan : " . $puluhan . "<br>";
            echo "Satuan : " . $satuan . "<br>";
        }

    ?>

</body>
</html>