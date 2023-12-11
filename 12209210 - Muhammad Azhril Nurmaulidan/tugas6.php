<!DOCTYPE html>
<html>
<head>
    <title>Nomor 6</title>
</head>
<body>
<form action="#" method="post">
    Masukkan detik <br> <input type="text" name="detik"> <br><br>
    <input type="submit" name="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $detik = intval($_POST["detik"]);

    $jam = floor($detik / 3600);
    $sisa_detik = ($detik % 3600);
    $menit = floor($sisa_detik / 60);
    $detik = $sisa_detik % 60;

    if ($jam > 0) {
        echo "$jam jam";
    }
    if ($menit > 0) {
        echo "$menit menit";
    }
    if ($detik > 0) {
        echo "$detik detik";
    }

    $total_detik = $detik + ($menit * 60) + ($jam * 3600);
}
?>
</body>
</html>
