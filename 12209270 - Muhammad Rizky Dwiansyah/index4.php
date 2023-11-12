<DOCTYPE html>
<html>
<head>
    <title>Kalkulator Gaji Karyawan</title>
</head>
<body>
    <h1>Kalkulator Gaji Karyawan</h1>
    
    <form method="post" action="">
        <label for="nama">Nama Karyawan:</label>
        <input type="text" id="nama" name="nama"><br>
        
        <label for="gaji_pokok">Gaji Pokok:</label>
        <input type="number" id="gaji_pokok" name="gaji_pokok"><br>
        <input type="submit" name="hitung" value="Hitung">
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $nama = $_POST['nama'];
        $gaji_pokok = $_POST['gaji_pokok'];

        $tunj = 0.2 * $gaji_pokok;
        $pjk = 0.15 * ($gaji_pokok + $tunj);
        $gaji_bersih = $gaji_pokok + $tunj - $pjk;

        echo "<h2>Hasil Perhitungan</h2>";
        echo "Nama Karyawan: " . $nama . "<br>";
        echo "Tunjangan: " . $tunj . "<br>";
        echo "Pajak: " . $pjk . "<br>";
        echo "Gaji Bersih: " . $gaji_bersih . "<br>";
        $gambar = '<img src="bayaranime.jpg"/>';
        echo $gambar;
    }
    ?>
</body>
</html>








