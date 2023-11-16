<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor 19</title>
</head>
<body>
    <form action="" method="post">
        <label for="vip">Input VIP :</label>
        <input type="number" name="vip">
        <label for="eksekutif">Input Eksekutif :</label>
        <input type="number" name="eksekutif">
        <label for="ekonomi">Input Ekonomi :</label>
        <input type="number" name="ekonomi">
        <input type="submit" name="submit">
    </form>
    <?php
        if(isset($_POST['submit'])) {
            $vip = $_POST['vip'];
            $eksekutif = $_POST['eksekutif'];
            $ekonomi = $_POST['ekonomi'];

            if($vip >= 35) {
                $keuntungan_vip = 0.25;
            }else if($vip < 35 && $vip >= 20) {
                $keuntungan_vip = 0.15;
            }else if ($vip < 20) {
                $keuntungan_vip = 0.05;
            }

            if($eksekutif >= 40) {
                $keuntungan_eksekutif = 0.2;
            }else if($eksekutif < 40 && $eksekutif >= 20) {
                $keuntungan_eksekutif = 0.1;
            }else if($eksekutif < 20) {
                $keuntungan_eksekutif = 0.02;
            }

            $keuntungan_ekonomi = 0.07;

            $keuntungan_keseluruhan = $keuntungan_vip + $keuntungan_eksekutif + $keuntungan_ekonomi;
            $total_tiket = $vip + $ekonomi + $eksekutif;
            
            echo "<p>Keuntungan VIP : $keuntungan_vip <br> Keuntungan Eksekutif : $keuntungan_eksekutif <br> Keuntungan Ekonomi : $keuntungan_ekonomi <br> Keuntungan Keseluruhan : $keuntungan_keseluruhan <br> Total Tiket : $total_tiket</p>";
        }
    ?>
</body>
</html>