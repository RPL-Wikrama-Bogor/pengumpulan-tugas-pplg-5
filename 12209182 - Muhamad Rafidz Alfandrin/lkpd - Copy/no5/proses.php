<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jam = intval($_POST["jam"]);
    $menit = intval($_POST["menit"]);
    $detik = intval($_POST["detik"]);
    
    $total_detik = ($jam * 3600) + ($menit * 60) + $detik;
    
    echo "Total Detik: " . $total_detik;
}
?>