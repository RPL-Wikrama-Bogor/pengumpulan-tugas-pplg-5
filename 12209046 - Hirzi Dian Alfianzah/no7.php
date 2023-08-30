<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7</title>

    <!-- Tambahkan pautan ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Menghitung Jumlah Uang yang Harus Dibayar Pembeli</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="kg">Kg</label>
                <input type="text" class="form-control" name="kg" placeholder="KG" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

        <?php
        if(isset($_POST['submit'])){
            $kg = $_POST['kg'];

            // Menghitung Harga Sebelumnya
            $harga_sebelum = 500 * $kg;

            // Menghitung Diskon 
            $diskon = 5 * $harga_sebelum / 100;

            // Menghitung Harga Setelah Diskon
            $harga_setelah = $harga_sebelum - $diskon;
        ?>

            <h3 class="mt-4">Hasil Perhitungan</h3>
            <ul>
                <li>Harga Sebelumnya: Rp. <?php echo number_format($harga_sebelum, 0, ',', '.'); ?></li>
                <li>Diskon: Rp. <?php echo number_format($diskon, 0, ',', '.'); ?></li>
                <li>Jumlah yang Harus Dibayar: Rp. <?php echo number_format($harga_setelah, 0, ',', '.'); ?></li>
            </ul>

        <?php
        }
        ?>

        <div class="text-center mt-4">
            <a class="btn btn-primary" href="no8.php">Lanjut</a>
            <br><br>
            <a class="btn btn-secondary" href="no6.php">Kembali</a>
        </div>
    </div>

    <!-- Tambahkan pautan ke Bootstrap JS dan jQuery di sini (opsional) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>
