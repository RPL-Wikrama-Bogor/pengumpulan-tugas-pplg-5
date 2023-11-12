<!DOCTYPE html>
<html>
<head>
    <title>Konversi Detik ke Jam:Menit:Detik</title>
</head>
<body>
    <form method="post">
        Masukkan jumlah detik: <input type="number" name="detik" required>
        <input type="submit" value="Konversi">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $detik = ($_POST["detik"]);

        $jam = (int)($detik / 3600);
        $sisa_detik = $detik % 3600;
        $menit = (int)($sisa_detik / 60);
        $sisa_detik = $sisa_detik % 60;

        echo "Hasil konversi: $jam jam, $menit menit, $sisa_detik detik";
    }
    ?>
</body>
</html>

