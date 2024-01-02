<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Gaji Karyawan</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<body>
    <h1>Kalkulator Gaji Karyawan</h1>
    <form method="post" action="">
        <label for="nama">Nama Karyawan:</label>
        <input type="text" name="nama" required class="form-control"><br><br>
        <label for="gaji_pokok">Gaji Pokok:</label>
        <input type="number" name="gaji_pokok" required class="form-control"><br><br>
        <button type="submit" name="hitung" value="Hitung Gaji"class="btn btn-dark" style="width:100%;">hitung</button>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        
        $nama = $_POST['nama'];
        $gaji_pokok = $_POST['gaji_pokok'];

        
        $tunj = 0.2 * $gaji_pokok;

       
        $pjk = 0.15 * ($gaji_pokok + $tunj);

       
        $gaji_bersih = $gaji_pokok + $tunj - $pjk;

      
        echo "<h2>Hasil Perhitungan</h2>";
        echo "Nama Karyawan: $nama<br>";
        echo "Tunjangan: Rp " . number_format($tunj, 2) . "<br>";
        echo "Pajak: Rp " . number_format($pjk, 2) . "<br>";
        echo "Gaji Bersih: Rp " . number_format($gaji_bersih, 2) . "<br>";
    }
    ?>

</body>
</html>
