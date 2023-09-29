<!DOCTYPE html>
<html>
<head>
    <title>No 18</title>
</head>
<body>
    <h2>Pencarian Juara Kelas</h2>
    <form method="post" action="">
        <table>
        <label for="nama">Nama Siswa: </label>
        <input type="text" name="nama" required><br><br>

        <label for="mtk">Nilai MTK: </label>
        <input type="number" name="mtk" required><br><br>

        <label for="indo">Nilai INDO: </label>
        <input type="number" name="indo" required><br><br>

        <label for="ingg">Nilai INGGRIS: </label>
        <input type="number" name="ingg" required><br><br>

        <label for="dpk">Nilai DPK: </label>
        <input type="number" name="dpk" required><br><br>

        <label for="agama">Nilai PABP: </label>
        <input type="number" name="agama" required><br><br>

        <label for="kehadiran">Kehadiran (dalam persen): </label>
        <input type="number" name="kehadiran" required><br><br>

        <input type="submit" name="submit" value="Cari Juara">
        </table>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $mtk = intval($_POST['mtk']);
        $indo = intval($_POST['indo']);
        $ingg = intval($_POST['ingg']);
        $dpk = intval($_POST['dpk']);
        $agama = intval($_POST['agama']);
        $kehadiran = intval($_POST['kehadiran']);

        $total_nilai = $mtk + $indo + $ingg + $dpk + $agama;
        $nilai_rata_rata = $total_nilai / 5;

        if ($nilai_rata_rata >= 95 && $kehadiran == 100) {
            echo "<p>Selamat kepada $nama, Anda adalah juara kelas!</p>";
        } else {
            echo "<p>Maaf, $nama belum memenuhi syarat menjadi juara kelas.</p>";
        }
    }
    ?>
</body>
</html>