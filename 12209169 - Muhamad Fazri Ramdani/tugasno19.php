<!DOCTYPE html>
<html>
<head>
    <title>Hitung Penghasilan Penjualan Tiket Bioskop</title>
</head>
<body>
    <h1>Hitung Penghasilan Penjualan Tiket Bioskop</h1>
    <style>/* Style umum untuk body */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
    text-align: center;
}

/* Style untuk h1 */
h1 {
    font-size: 24px;
    color: #333;
    margin-top: 20px;
}

/* Style untuk form */
form {
    max-width: 400px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

/* Style untuk label */
label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

/* Style untuk input number */
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

/* Style untuk tombol submit */
input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

/* Style untuk tombol submit saat dihover */
input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Style untuk hasil */
h2 {
    margin-top: 20px;
    font-size: 18px;
    color: #333;
}

/* Style untuk hasil keuntungan dan jumlah tiket */
p {
    font-size: 16px;
    color: #666;
    margin: 5px 0;
}
</style>
    <?php
    $vip_tickets_sold = isset($_POST["vip_tickets_sold"]) ? intval($_POST["vip_tickets_sold"]) : 0;
    $executive_tickets_sold = isset($_POST["executive_tickets_sold"]) ? intval($_POST["executive_tickets_sold"]) : 0;
    $economy_tickets_sold = isset($_POST["economy_tickets_sold"]) ? intval($_POST["economy_tickets_sold"]) : 0;

    $vip_profit_percentage = 0;
    $executive_profit_percentage = 0;
    $economy_profit_percentage = 0;

    if ($vip_tickets_sold >= 35) {
        $vip_profit_percentage = 0.25;
    } elseif ($vip_tickets_sold >= 20) {
        $vip_profit_percentage = 0.15;
    } else {
        $vip_profit_percentage = 0.05;
    }

    if ($executive_tickets_sold >= 40) {
        $executive_profit_percentage = 0.20;
    } elseif ($executive_tickets_sold >= 20) {
        $executive_profit_percentage = 0.10;
    } else {
        $executive_profit_percentage = 0.02;
    }

    $economy_profit_percentage = 0.07;

    $vip_profit = $vip_tickets_sold * $vip_profit_percentage;
    $executive_profit = $executive_tickets_sold * $executive_profit_percentage;
    $economy_profit = $economy_tickets_sold * $economy_profit_percentage;

    $total_profit = $vip_profit + $executive_profit + $economy_profit;
    $total_tickets_sold = $vip_tickets_sold + $executive_tickets_sold + $economy_tickets_sold;
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="vip_tickets_sold">Tiket VIP Terjual:</label>
        <input type="number" id="vip_tickets_sold" name="vip_tickets_sold" value="<?php echo $vip_tickets_sold; ?>"><br><br>
        
        <label for="executive_tickets_sold">Tiket Eksekutif Terjual:</label>
        <input type="number" id="executive_tickets_sold" name="executive_tickets_sold" value="<?php echo $executive_tickets_sold; ?>"><br><br>
        
        <label for="economy_tickets_sold">Tiket Ekonomi Terjual:</label>
        <input type="number" id="economy_tickets_sold" name="economy_tickets_sold" value="<?php echo $economy_tickets_sold; ?>"><br><br>
        
        <input type="submit" value="Hitung">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <h2>Hasil :</h2>
        <p>Keuntungan Tiket VIP : <?php echo $vip_profit; ?></p>
        <p>Keuntungan Tiket Eksekutif : <?php echo $executive_profit; ?></p>
        <p>Keuntungan Tiket Ekonomi : <?php echo $economy_profit; ?></p>
        <p>Keuntungan Total : <?php echo $total_profit; ?></p>
        <p>Jumlah Tiket Total Terjual : <?php echo $total_tickets_sold; ?></p>
    <?php } ?>
</body>
</html>