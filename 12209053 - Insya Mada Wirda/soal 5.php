<!DOCTYPE html>
<head>
    <title>tugas</title>
</head>

<?php
    $jam = $_GET['jam'] ?? null;
    $menit = $_GET['menit'] ?? null;
    $detik = $_GET['detik'] ?? null;

    $total = 0;

    if (is_numeric($jam) && is_numeric($menit) && is_numeric($detik)) {
        $count_jam = $jam * 3600;
        $count_menit = $menit * 60;
        $total = $count_jam + $count_menit + $detik;
    }
?>
 
<body>
    <center>
    <div id="page-wrap">
        <h1>Analisis data</h1>

        <form action="" method="GET">
            <label for="jam">Jam</label>
            <br>
            <input type="number" name="jam" id="jam" required="required" value="<?php echo $jam; ?>" />
            <br><br>

            <label for="menit">Menit</label>
            <br>
            <input type="number" name="menit" id="menit" required="required" value="<?php echo $menit; ?>" />
            <br><br>

            <label for="detik">Detik</label>
            <br>
            <input type="number" name="detik" id="detik" required="required" value="<?php echo $detik; ?>" />
            <br><br>

            <input type="submit" value="kirim" />
            
            <p>Total : <?php echo $total ?></p>
        </form>
</center>
    </div>
</body>
</html>