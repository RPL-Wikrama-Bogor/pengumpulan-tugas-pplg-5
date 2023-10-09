<?php
$waktu = "23:59:59"; // Contoh data waktu

list($jam, $menit, $detik) = explode(":", $waktu);

$detik++;
if ($detik >= 60) {
    $menit++;
    $detik = 0;
    if ($menit >= 60) {
        $jam++;
        $menit = 0;
        if ($jam >= 24) {
            $jam = 0;
        }
    }
}

$jam = str_pad($jam, 2, "0", STR_PAD_LEFT);
$menit = str_pad($menit, 2, "0", STR_PAD_LEFT);
$detik = str_pad($detik, 2, "0", STR_PAD_LEFT);

$waktuBaru = "$jam:$menit:$detik";

echo "Waktu setelah ditambahkan 1 detik: $waktuBaru";
?>
