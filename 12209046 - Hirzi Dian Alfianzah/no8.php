<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8</title>

    <!-- Tambahkan pautan ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Input Sebuah Bilangan Bulat</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="bilangan">Input Bilangan</label>
                <input type="number" class="form-control" name="bilangan" placeholder="Input Bilangan" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

        <?php
        if(isset($_POST['submit'])){
            $bilangan = $_POST['bilangan'];

            // Mencari Satuan
            $satuan = ($bilangan % 10);

            // Mencari Puluhan
            $puluhan = ($bilangan / 10) % 10;

            // Mencari Ratusan
            $ratusan = ($bilangan / 100);

            // Menggunakan number_format() untuk mengatur tampilan angka
            echo "<h3 class='mt-4'>Hasil Perhitungan</h3>";
            echo "Angka yang diinput: " .$bilangan . "<br>";
            echo "Angka Satuan: " . $satuan . "<br>";
            echo "Angka Puluhan: " . $puluhan . "<br>";
            echo "Angka Ratusan: " . $ratusan . "<br>";
        }
        ?>

        <div class="text-center mt-4">
            <a class="btn btn-primary" href="no9.php">Lanjut</a>
            <br><br>
            <a class="btn btn-secondary" href="no7.php">Kembali</a>
        </div>
    </div>

    <!-- Tambahkan pautan ke Bootstrap JS dan jQuery di sini (opsional) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>
