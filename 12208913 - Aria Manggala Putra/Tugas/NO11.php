<!DOCTYPE html>
<html>
<head>
    <title>Nomer 11</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <h2>Informasi Pegawai</h2>
        <label for="nomorPegawai">Masukkan nomor pegawai (11 digit):</label>
        <input type="text" name="nomorPegawai" id="nomorPegawai" maxlength="11" required>
        <br>
        <button type="submit">Cetak</button>
    </form>
 <div class="echo">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomorPegawai = $_POST["nomorPegawai"];

        $nomorGolongan = substr($nomorPegawai, 0, 1);
        $tanggalLahir = substr($nomorPegawai, 1, 2);
        $bulanLahir = substr($nomorPegawai, 3, 2);
        $tahunLahir = substr($nomorPegawai, 5, 4);
        $nomorUrut = substr($nomorPegawai, 9, 2);

        // Konversi bulan dari angka menjadi nama bulan
        $namaBulan = date("F", mktime(0, 0, 0, intval($bulanLahir), 1));

        echo "<h3>Informasi Pegawai:</h3>";
        echo "Nomor Golongan: $nomorGolongan<br>";
        echo "Tanggal Lahir: $tanggalLahir $namaBulan $tahunLahir<br>";
        echo "Nomor Urut: $nomorUrut";
    }
    ?>
    </div>
</body>
</html>
