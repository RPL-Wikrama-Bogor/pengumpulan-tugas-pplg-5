<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>6</title>

    <!-- Tambahkan pautan ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center">Konversi Total Detik ke Jam-Menit-Detik</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="total_detik">Total Detik</label>
                <input type="number" class="form-control" name="total_detik" placeholder="Total Detik" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Konversi</button>
        </form>

        <?php
        if(isset($_POST['submit'])){
            $total_detik = $_POST['total_detik'];

            //fungsi floor adalah untuk membulatkan bilangan ke bawah
            // Menghitung jam
            $jam = floor($total_detik / 3600);
            
            // Menghitung sisa detik setelah menghitung jam
            $sisa_detik = $total_detik % 3600;

            // Menghitung menit
            $menit = floor($sisa_detik / 60);

            // Menghitung sisa detik
            $detik = $sisa_detik % 60;

            // Menampilkan hasil
            echo "<h2 class='mt-4'>Hasil Konversi</h2>";
            echo "Total Detik: " . $total_detik . " detik<br>";
            echo "Jam: " . $jam . " jam<br>";
            echo "Menit: " . $menit . " menit<br>";
            echo "Detik: " . $detik . " detik<br>";
        }
        ?>
        <div class="text-center">
            <a class="btn btn-primary" href="no7.php">Lanjut</a>
            <br><br>
            <a class="btn btn-secondary" href="no5.php">Kembali</a>
        </div>
    </div>

</html>
