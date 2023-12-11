<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4</title>
    <!-- Link boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head> 
<div class="card">
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="container">
        <div class="text-center">
            <h2>Menentukan Gaji Karyawan</h2>
        </div>
        <form action="" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" name="nama" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="form-group">
                <label for="gaji_pokok">Gaji Pokok <span style="color:red;">Isi tanpa (. & ,)</span> </label>
                <input type="number" class="form-control" name="gaji_pokok" placeholder="Gaji Pokok" required>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block" name="submit">Hitung</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $gaji_pokok = $_POST['gaji_pokok'];

            // Menghitung tunjangan (20% dari gaji pokok)
            $tunj = 0.20 * $gaji_pokok;

            // Menghitung pajak (15% dari gaji pokok + tunjangan)
            $pjk = 0.15 * ($gaji_pokok + $tunj);

            // Menghitung gaji bersih (gaji pokok + tunjangan - pajak)
            $gaji_bersih = $gaji_pokok + $tunj - $pjk;

            // Menampilkan hasil
            echo "<div class='mt-4'>";
            echo "<h2 class='text-center'>Hasil Perhitungan</h2>";
            echo "<ul>";
            echo "<li>Nama Karyawan: $nama</li>";
                //fungsi number_format ialah untuk mengatur tampilan angka atau bilangan desimal dengan format tertentu sebelum mencetaknya ke halaman web.
            echo "<li>Tunjangan: Rp " . number_format($tunj, 0, ',', '.') . "</li>";
            echo "<li>Pajak: Rp " . number_format($pjk, 0, ',', '.') . "</li>";
            echo "<li>Gaji Bersih: Rp " . number_format($gaji_bersih, 0, ',', '.') . "</li>";
            echo "</ul>";
            echo "</div>";
        }
        ?>
        <div class="text-center mt-4">
            <a class="btn btn-primary" href="no5.php">Lanjut</a>
        </div>
    </div>
    </div>
</body>
</html>
