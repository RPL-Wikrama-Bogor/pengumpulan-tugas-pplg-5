<!DOCTYPE html>
<html>
<head>
    <title>Pencarian Juara Kelas</title>
</head>
<body>
    <h1>Pencarian Juara Kelas</h1>

    <form method="post" action="">
        <?php
        
        $jumlahSiswa = 15;
        $mataPelajaran = array("MTK", "INDO", "INGG", "DPK", "Agama");

        
        $dataSiswa = array();

        
        for ($i = 1; $i <= $jumlahSiswa; $i++) {
            echo "<h3>" . $i . "</h3>";
            echo "<label>Nama : </label>";
            echo "<input type='text' name='nama[" . $i . "]' required><br>";
            foreach ($mataPelajaran as $pelajaran) {
                echo "<label>Nilai " . $pelajaran . ": </label>";
                echo "<input type='number' name='nilai[" . $i . "][" . $pelajaran . "]' required><br>";
            }
            echo "<label>Kehadiran Siswa " . $i . ": </label>";
            echo "<input type='number' name='kehadiran[" . $i . "]' required><br>";
        }
        ?>

        <input type="submit" name="submit" value="Cari Juara Kelas">
    </form>

    <?php
   
    if (isset($_POST['submit'])) {
        $totalNilai = array();
        $totalKehadiran = array();

       
        foreach ($_POST['nilai'] as $siswa => $nilai) {
            $totalNilai[$siswa] = array_sum($nilai);
        }
        foreach ($_POST['kehadiran'] as $siswa => $kehadiran) {
            $totalKehadiran[$siswa] = $kehadiran;
        }

        
        $juaraKelas = array();
        foreach ($totalNilai as $siswa => $nilai) {
            if ($nilai >= 475 && $totalKehadiran[$siswa] == 100) {
                $namaSiswa = $_POST['nama'][$siswa];
                $juaraKelas[] = $namaSiswa;
            }
        }

       
        if (!empty($juaraKelas)) {
            echo "<h2>Juara Kelas:</h2>";
            foreach ($juaraKelas as $juara) {
                echo "<p>" . $juara . "</p>";
            }
        } else {
            echo "<p>Tidak ada juara kelas yang memenuhi persyaratan.</p>";
        }
    }
    ?>
</body>
</html>
