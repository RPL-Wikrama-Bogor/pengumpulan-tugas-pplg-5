<?php
// Input nilai dari masing-masing pelajaran
$nilaiPABP = 70;
$nilaiMatematika = 82;
$nilaiDPK = 77;

// Menghitung nilai rata-rata
$rataRata = ($nilaiPABP + $nilaiMatematika + $nilaiDPK) / 3;

// Menentukan grade berdasarkan nilai rata-rata
if ($rataRata >= 80) {
    $grade = 'A';
} elseif ($rataRata >= 75) {
    $grade = 'B';
} elseif ($rataRata >= 65) {
    $grade = 'C';
} elseif ($rataRata >= 45) {
    $grade = 'D';
} else {
    $grade = 'E';
}

echo "Nilai rata-rata: $rataRata\n";
echo "Grade: $grade\n";
?>
