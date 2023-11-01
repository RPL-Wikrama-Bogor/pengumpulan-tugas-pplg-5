<!DOCTYPE html>
<html>
<head>
    <title>Hitung Penghasilan Penjualan Tiket Bioskop</title>
</head>
<body>
    <h3>Hitung Penghasilan Penjualan Tiket Bioskop</h3>
    
    <?php
    $vip = isset($_POST["vip"]) ? intval($_POST["vip"]) : 0;
    $exsekutif = isset($_POST["exsekutif"]) ? intval($_POST["exsekutif"]) : 0;
    $ekonomi = isset($_POST["ekonomi"]) ? intval($_POST["ekonomi"]) : 0;

    $vip_diskon = 0;
    $exsekutif_diskon = 0;
    $ekonomi_diskon = 0;

    if ($vip >= 35) {
        $vip_diskon = 0.25;
    } elseif ($vip >= 20) {
        $vip_diskon = 0.15;
    } else {
        $vip_diskon = 0.05;
    }

    if ($exsekutif >= 40) {
        $exsekutif_diskon = 0.20;
    } elseif ($exsekutif >= 20) {
        $exsekutif_diskon = 0.10;
    } else {
        $exsekutif_diskon = 0.02;
    }

    $ekonomi_diskon = 0.07;

    $vip_profit = $vip * $vip_diskon;
    $executive_profit = $exsekutif * $exsekutif_diskon;
    $economy_profit = $ekonomi * $ekonomi_diskon;

    $total_profit = $vip_profit + $executive_profit + $economy_profit;
    $total_tickets_sold = $vip + $exsekutif + $ekonomi;
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="vip">Tiket VIP Terjual:</label>
        <input type="number" id="vip" name="vip" value="<?php echo $vip; ?>"><br><br>
        
        <label for="exsekutif">Tiket Eksekutif Terjual:</label>
        <input type="number" id="exsekutif" name="exsekutif" value="<?php echo $exsekutif; ?>"><br><br>
        
        <label for="ekonomi">Tiket Ekonomi Terjual:</label>
        <input type="number" id="ekonomi" name="ekonomi" value="<?php echo $ekonomi; ?>"><br><br>
        
        <input type="submit" value="Hitung">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <h2>Hasil:</h2>
        <p>Keuntungan Tiket VIP: <?php echo $vip_profit; ?></p>
        <p>Keuntungan Tiket Eksekutif: <?php echo $executive_profit; ?></p>
        <p>Keuntungan Tiket Ekonomi: <?php echo $economy_profit; ?></p>
        <p>Keuntungan Total: <?php echo $total_profit; ?></p>
        <p>Jumlah Tiket Total Terjual: <?php echo $total_tickets_sold; ?></p>
    <?php } ?>
</body>
</html>