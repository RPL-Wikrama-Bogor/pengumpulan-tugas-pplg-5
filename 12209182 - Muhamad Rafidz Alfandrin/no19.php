   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   </head>
   <body>
   <form method="post" action="">
            <label> VIP:</label><br>
            <input type="number" name="vip" class="form-control">
            <br>
            <label> Eksekutif:</label><br>
            <input type="number" name="eksekutif" class="form-control">
            <br>
            <label> Ekonomi:</label><br>
            <input type="number" name="ekonomi" class="form-control">
            <br><br>
            <input type="submit" name= "submit" value="submit">
   </body>
   </html>
   
    <?php
    if (isset($_POST['submit'])) {
        $vip  = $_POST['vip'];
        $eksekutif  = $_POST['eksekutif'];
        $ekonomi  = $_POST['ekonomi'];

        if ($vip >= 40) {
            $keuntungan_vip = 25;
        }
        elseif ($vip >= 20 && $vip < 40) {
            $keuntungan_vip= 15;
        }
        elseif ($vip >0 && $vip <20) {
            $keuntungan_vip = 5;
        }
        else {
            $keuntungan_vip = 0;
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
        $total = $vip + $eksekutif + $ekonomi;

        echo "<br>";
        echo "Keuntungan Seluruh Kelas = $seluruh_keuntungan%";
        echo "<br>";
        echo "Keuntungan VIP = $keuntungan_vip%";
        echo "<br>";
        echo "Keuntungan Eksekutif = $keuntungan_eksekutif%";
        echo "<br>";
        echo "Keuntungan Ekonomi = $keuntungan_ekonomi%";
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