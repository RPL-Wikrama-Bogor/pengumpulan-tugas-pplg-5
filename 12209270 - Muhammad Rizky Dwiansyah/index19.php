<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Penghasilan Penjualan Tiket Bioskop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            background: #525252; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            width: 40rem;
        }
    </style>
</head>
<body>
<div class="card">
  <div class="card-body">
    <h1>Kalkulator Penghasilan Penjualan Tiket Bioskop</h1>
   
    <form action="" method="post">
        <label for="tiketVIP">Jumlah Tiket VIP:</label>
        <input type="number" id="tiketVIP" name="tiketVIP" required><br><br>
        
        <label for="tiketEksekutif">Jumlah Tiket Eksekutif:</label>
        <input type="number" id="tiketEksekutif" name="tiketEksekutif" required><br><br>
        
        <label for="tiketEkonomi">Jumlah Tiket Ekonomi:</label>
        <input type="number" id="tiketEkonomi" name="tiketEkonomi" required><br><br>
        
        <input type="submit" value="Hitung Penghasilan">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tiketVIP = $_POST["tiketVIP"];
        $tiketEksekutif = $_POST["tiketEksekutif"];
        $tiketEkonomi = $_POST["tiketEkonomi"];

        $keuntunganVIP = 0;
        $keuntunganEksekutif = 0;
        $keuntunganEkonomi = 0;
        $totalTiket = $tiketVIP + $tiketEksekutif + $tiketEkonomi;
        $totalKeuntungan = 0;

        if ($tiketVIP >= 35) {
            $keuntunganVIP = $tiketVIP * 0.25;
        } elseif ($tiketVIP >= 20) {
            $keuntunganVIP = $tiketVIP * 0.15;
        } else {
            $keuntunganVIP = $tiketVIP * 0.05;
        }

        if ($tiketEksekutif >= 40) {
            $keuntunganEksekutif = $tiketEksekutif * 0.20;
        } elseif ($tiketEksekutif >= 20) {
            $keuntunganEksekutif = $tiketEksekutif * 0.10;
        } else {
            $keuntunganEksekutif = $tiketEksekutif * 0.02;
        }

        $keuntunganEkonomi = $tiketEkonomi * 0.07;

        $totalKeuntungan = $keuntunganVIP + $keuntunganEksekutif + $keuntunganEkonomi;
        
        echo "<h2>Hasil Penghitungan Penghasilan</h2>";
        echo "<p>Keuntungan Tiket VIP: $keuntunganVIP</p>";
        echo "<p>Keuntungan Tiket Eksekutif: $keuntunganEksekutif</p>";
        echo "<p>Keuntungan Tiket Ekonomi: $keuntunganEkonomi</p>";
        echo "<p>Total Tiket Terjual: $totalTiket</p>";
        echo "<p>Total Keuntungan: $totalKeuntungan</p>";
    }
    ?>
    </div>
</div>
</body>
</html>