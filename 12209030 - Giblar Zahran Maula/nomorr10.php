<?php

$pabp = 70;
$matematika = 82;
$dpk = 77;

$nilai_rata_rata = ($pabp + $matematika + $dpk) / 3;


$grade = '';

if ($nilai_rata_rata >= 80) {
    $grade = 'A';
} elseif ($nilai_rata_rata >= 75) {
    $grade = 'B';
} elseif ($nilai_rata_rata >= 65) {
    $grade = 'C';
} elseif ($nilai_rata_rata >= 45) {
    $grade = 'D';
} elseif($nilai_rata_rata >= 0) {
    $grade = 'E';
}else{
    $grade = 'K';
}

echo "Rata-rata Nilai: $nilai_rata_rata<br>";
echo "Grade: $grade";
?>
