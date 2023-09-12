<!DOCTYPE html>
<html>
<head>
    <title>Hitung Penghasilan Penjualan Tiket Bioskop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Hitung Penghasilan Penjualan Tiket Bioskop</h1>
        <form method="post" action="">
            <div class="mb-3">
                <label for="vip">Jumlah Tiket VIP Terjual:</label>
                <input type="number" class="form-control" id="vip" name="vip" min="0" required>
            </div>
            <div class="mb-3">
                <label for="eksekutif">Jumlah Tiket Eksekutif Terjual:</label>
                <input type="number" class="form-control" id="eksekutif" name="eksekutif" min="0" required>
            </div>
            <div class="mb-3">
                <label for="ekonomi">Jumlah Tiket Ekonomi Terjual:</label>
                <input type="number" class="form-control" id="ekonomi" name="ekonomi" min="0" required>
            </div>
            <button type="submit" class="btn btn-primary">Hitung</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $jumlah_tiket_vip = $_POST["vip"];
            $jumlah_tiket_eksekutif = $_POST["eksekutif"];
            $jumlah_tiket_ekonomi = $_POST["ekonomi"];

            $keuntungan_vip = 0;
            $keuntungan_eksekutif = 0;
            $keuntungan_ekonomi = 0;

           
            if ($jumlah_tiket_vip >= 35) {
                $keuntungan_vip = $jumlah_tiket_vip * 25 / 100;
            } elseif ($jumlah_tiket_vip >= 20 && $jumlah_tiket_vip < 35) {
                $keuntungan_vip = $jumlah_tiket_vip * 15 / 100;
            } else {
                $keuntungan_vip = $jumlah_tiket_vip * 5 / 100;
            }

           
            if ($jumlah_tiket_eksekutif >= 40) {
                $keuntungan_eksekutif = $jumlah_tiket_eksekutif * 20 / 100;
            } elseif ($jumlah_tiket_eksekutif >= 20 && $jumlah_tiket_eksekutif < 40) {
                $keuntungan_eksekutif = $jumlah_tiket_eksekutif * 10 / 100;
            } else {
                $keuntungan_eksekutif = $jumlah_tiket_eksekutif * 2 / 100;
            }

         
            $keuntungan_ekonomi = $jumlah_tiket_ekonomi * 7 / 100;

           
            $total_tiket = $jumlah_tiket_vip + $jumlah_tiket_eksekutif + $jumlah_tiket_ekonomi;
            $total_keuntungan = $keuntungan_vip + $keuntungan_eksekutif + $keuntungan_ekonomi;

            echo "<h2>Hasil Perhitungan:</h2>";
            echo "<p>Keuntungan Tiket VIP: $keuntungan_vip %</p>";
            echo "<p>Keuntungan Tiket Eksekutif: $keuntungan_eksekutif %</p>";
            echo "<p>Keuntungan Tiket Ekonomi: $keuntungan_ekonomi%</p>";
            echo "<p>Total Tiket Terjual: $total_tiket</p>";
            echo "<p>Total Keuntungan Keseluruhan: $total_keuntungan%</p>";
        }
        ?>
    </div>
</body>
</html>
