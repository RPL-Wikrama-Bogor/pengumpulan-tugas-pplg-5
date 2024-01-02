<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 19</title>
</head>
<body>
    <!-- input -->
    <h2>Perhitungan Keuntungan Bioskop</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td> Tiket VIP</td>
                <td>  :  </td>
                <td><input type="number" name="vip" id="vip"></td>
            </tr>
            <tr>
                <td>Tiket Eksekutif</td>
                <td>  :  </td>
                <td><input type="number" name="eksekutif" id="eksekutif"></td>
            </tr>
            <tr>
                <td>Tiket Ekonomi</td>
                <td>  :  </td>
                <td><input type="number" name="ekonomi" id="ekonomi"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" id="submit"></td>
            </tr>
        </table>
    </form>

    <?php
    // proses
    if (isset($_POST['submit'])) {
        $tiket [] = $_POST['vip'];
        $tiket [] = $_POST['eksekutif'];
        $tiket [] = $_POST['ekonomi'];

        $vip = $tiket[0];
        $eksekutif = $tiket[1];
        $ekonomi = $tiket[2];

        if ($vip >=40) {
            $keuntungan_vip = 25;
        }
        elseif ($vip >= 20 && $vip < 40) {
            $keuntungan_vip= 15;
        }
        elseif ($vip >0 && $vip <20) {
            $keuntungan_vip = 5;
        }
        else {
            $keuntungan_vip= 0;
        }

        if ($eksekutif >= 40) {
            $keuntungan_eksekutif = 20;
        }
        elseif ($eksekutif >= 20 && $eksekutif <40) {
            $keuntungan_eksekutif = 10;
        }
        elseif ($eksekutif <20 &&  $eksekutif >0) {
            $keuntungan_eksekutif = 2;
        }
        else{
            $keuntungan_eksekutif = 0;
        }

        if ($ekonomi >0 && $ekonomi <=50) {
            $keuntungan_ekonomi= 7;
        }
        else {
            $keuntungan_ekonomi= 0;
        }

        $seluruh_keuntungan = $keuntungan_vip + $keuntungan_eksekutif + $keuntungan_ekonomi;
        $total = array_sum($tiket);

        //output
        echo "<br>";
        echo "Keuntungan Seluruh Kelas = $seluruh_keuntungan%";
        echo "<br>";
        echo "Keuntungan Kelas VIP = $keuntungan_vip%";
        echo "<br>";
        echo "Keuntungan Kelas Eksekutif = $keuntungan_eksekutif%";
        echo "<br>";
        echo "Keuntungan Kelas Ekonomi = $keuntungan_ekonomi%";
        echo "<br>";

        echo "<br>";
        echo "Jumlah Seluruh Tiket yang Terjual = $total tiket dari 150 tiket";
        echo "<br>";
        echo "Jumlah Tiket VIP yang Terjual = $vip tiket dari 50 tiket";
        echo "<br>";
        echo "Jumlah Tiket Eksekutif yang Terjual = $eksekutif tiket dari 50 tiket";
        echo "<br>";
        echo "Jumlah Tiket Ekonomi yang Terjual = $ekonomi tiket dari 50 tiket";
     }
    ?>
</body>
</html>