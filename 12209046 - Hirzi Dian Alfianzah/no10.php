<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10</title>

    <!-- Tambahkan pautan ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Penentuan Grade Rata-Rata</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama Siswa" required>
            </div>
            <h5>Nilai Siswa</h5>
            <div class="form-group">
                <label for="mtk">Matematika</label>
                <input type="text" class="form-control" name="mtk" placeholder="Matematika">
            </div>
            <div class="form-group">
                <label for="pabp">PABP</label>
                <input type="text" class="form-control" name="pabp" placeholder="PABP">
            </div>
            <div class="form-group">
                <label for="dpk">DPK</label>
                <input type="text" class="form-control" name="dpk" placeholder="DPK">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

        <?php
        if(isset($_POST['submit'])){
            $nama = $_POST['nama'];
            $mtk = $_POST['mtk'];
            $pabp = $_POST['pabp'];
            $dpk = $_POST['dpk'];

            $rata = ($pabp + $mtk + $dpk) / 3;

            echo "<h3 class='mt-4'>Hasil Penentuan Grade</h3>";
            echo "Nama Siswa: " . $nama . "<br>";
            echo "Nilai Rata-Rata: " . $rata . "<br>";

            if ($rata <= 100 && $rata >= 80) {
                echo "Grade: A" . "<br>";
            } elseif ($rata <= 80 && $rata >= 75) {
                echo "Grade: B" . "<br>";
            } elseif ($rata <= 75 && $rata >= 65) {
                echo "Grade: C" . "<br>";
            } elseif ($rata <= 65 && $rata >= 45) {
                echo "Grade: D" . "<br>";
            } elseif ($rata <= 45 && $rata >= 0) {
                echo "Grade: E" . "<br>";
            } else {
                echo "Angka tidak memenuhi persyaratan" . "<br>";
            }

            echo "Nilai Matematika: " . $mtk . "<br>";
            echo "Nilai PABP: " . $pabp . "<br>";
            echo "Nilai DPK: " . $dpk . "<br>";
        }
        ?>

        <div class="text-center mt-4">
            <a class="btn btn-primary" href="no11.php">Lanjut</a>
            <br><br>
            <a class="btn btn-secondary" href="no9.php">Kembali</a>
        </div>
    </div>

    <!-- Tambahkan pautan ke Bootstrap JS dan jQuery di sini (opsional) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>
