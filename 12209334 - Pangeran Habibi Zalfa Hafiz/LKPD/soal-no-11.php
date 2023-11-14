<!DOCTYPE html>
<html>
<head>
    <title>Form Input Kode Pegawai</title>
</head>
<body>
    <h2>Form Input Kode Pegawai</h2>
    <form method="post" action="">
        Masukkan Kode Pegawai (11 angka): <input type="text" name="kode_pegawai" maxlength="11" pattern="[0-9]{11}" required>
        <input type="submit" value="Submit">
    </form>

    <?php
    function getBulan($bulan) {
        $bulanArray = array(
            1 => "JAN",
            2 => "FEB",
            3 => "MAR",
            4 => "APR",
            5 => "MEI",
            6 => "JUN",
            7 => "JUL",
            8 => "AGU",
            9 => "SEP",
            10 => "OKT",
            11 => "NOV",
            12 => "DES"
        );

        return $bulanArray[$bulan];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kode_pegawai = $_POST["kode_pegawai"];

        $nomor_golongan = substr($kode_pegawai, 0, 1);
        $tanggal_lahir = substr($kode_pegawai, 1, 2);
        $bulan_lahir = substr($kode_pegawai, 3, 2);
        $tahun_lahir = substr($kode_pegawai, 5, 4);
        $nomor_urut = substr($kode_pegawai, 9, 2);

        $bulan_lahir_text = getBulan(intval($bulan_lahir));

        echo "<h3>Hasil:</h3>";
        echo "Nomor Golongan: $nomor_golongan <br>";
        echo "Tanggal Lahir: $tanggal_lahir-$bulan_lahir_text-$tahun_lahir <br>";
        echo "Nomor Urut: $nomor_urut";
    }
    ?>
     <br>
        <a href="soal-no-10.php">Soal Sebelumnya</a>
        <br>
        <a href="soal-no-12.php">Soal Berikutnya</a>
</body>
</html>
