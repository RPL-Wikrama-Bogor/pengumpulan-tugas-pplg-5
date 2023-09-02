<!DOCTYPE html>
<head>
    <title>Gaji karyawan</title>
</head>

<?php
    $nama = $_POST['nama'] ?? null;
    $gaji_pokok = $_POST['gaji_pokok'] ?? null;
    $tunj = 0;
    $pjk = 0;
    $gaji_bersih = 0;

    if ($nama && is_numeric($gaji_pokok)) {
        $tunj = (20 * $gaji_pokok) / 100;
        $pjk = (15 * ($gaji_pokok + $tunj)) / 100;
        $gaji_bersih = $gaji_pokok + $tunj - $pjk;
    }
?>
 
<body>
    <div id="page-wrap">
        <h1>Tabel Gaji Karyawan</h1>

        <form action="" method="post">
            <label for="nama">Nama</label>
            <br>
            <input type="text" name="nama" id="nama" required="required" value="<?php echo $nama; ?>" />

            <br><br>

            <label for="gajji">Gaji Pokok</label>
            <br>
            <input type="number" name="gaji_pokok" id="gaji_pokok" required="required" value="<?php echo $gaji_pokok; ?>" />
            
            <br><br>

            <input type="submit" value="Cari" />
            
            <p>Nama : <?php echo $nama ?></p>
            <p>Tunjangan : <?php echo $tunj ?></p>
            <p>Pajak : <?php echo $pjk ?></p>
            <p>Gaji Bersih : <?php echo $gaji_bersih ?></p>
        </form>
    </div>
</body>
</html>