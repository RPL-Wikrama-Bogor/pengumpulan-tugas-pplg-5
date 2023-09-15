<!DOCTYPE html>
<html>
<head>
    <title>Nomer 12</title>
</head>
<body>
    <h2>Tambah 1 Detik ke Waktu</h2>
    <form action="" method="post">
        <label for="jam">Jam:</label>
        <input type="number" name="jam" id="jam" min="0" max="23" required>
        <br>
        <label for="menit">Menit:</label>
        <input type="number" name="menit" id="menit" min="0" max="59" required>
        <br>
        <label for="detik">Detik:</label>
        <input type="number" name="detik" id="detik" min="0" max="59" required>
        <br>
        <button type="submit">Tambah 1 Detik</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jam = intval($_POST["jam"]);
        $menit = intval($_POST["menit"]);
        $detik = intval($_POST["detik"]);

        // Tambahkan 1 detik
        $detik += 1;
        if ($detik == 60) {
            $detik = 0;
            $menit += 1;
            if ($menit == 60) {
                $menit = 0;
                $jam += 1;
                if ($jam == 24) {
                    $jam = 0;
                }
            }
        }

        echo "<h3>Waktu setelah ditambahkan 1 detik:</h3>";
        echo sprintf("%02d:%02d:%02d", $jam, $menit, $detik);
    }
    ?>
</body>
</html>
