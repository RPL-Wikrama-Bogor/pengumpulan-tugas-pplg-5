<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5</title>

    <!-- Tambahkan pautan ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container">
        <h1 class="text-center">Konversi Jam-Menit-Detik ke Total Detik</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="jam">Jam</label>
                <input type="number" class="form-control" name="jam" placeholder="Jam" required>
            </div>
            <div class="form-group">
                <label for="menit">Menit</label>
                <input type="number" class="form-control" name="menit" placeholder="Menit" required>
            </div>
            <div class="form-group">
                <label for="detik">Detik</label>
                <input type="number" class="form-control" name="detik" placeholder="Detik" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

        <?php
        if(isset($_POST['submit'])){
            $jam = $_POST['jam'];
            $menit = $_POST['menit'];
            $detik = $_POST['detik'];

            // Menghitung total detik
            $total = ($jam * 3600) + ($menit * 60) + $detik;

            echo "<h2 class='mt-4'>Hasil Hitung</h2>";
            echo "<ul>";
            echo "<li>Jam: " . $jam . " jam</li>";
            echo "<li>Menit: " . $menit . " menit</li>";
            echo "<li>Detik: " . $detik . " detik</li>";
            echo "<li>Total Detik: " . $total . " detik</li>";
            echo "</ul>";
        }
        ?>
        <div class="text-center">
            <a class="btn btn-primary" href="no6.php">Lanjut</a>
            <br><br>
            <a class="btn btn-secondary" href="no4.php">Kembali</a>
        </div>
    </div>
    
</body>
</html>
