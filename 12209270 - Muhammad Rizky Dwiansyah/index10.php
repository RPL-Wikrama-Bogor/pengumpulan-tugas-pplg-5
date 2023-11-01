<!DOCTYPE html>
<html>
<head>
    <title>Penghitungan Rata-rata dan Grade</title>
</head>
<body>
    <h1>Penghitungan Rata-rata dan Grade</h1>
    
    <form method="post" action="">
        <label for="pabp">Nilai PABP:</label>
        <input type="number" id="pabp" name="pabp" min="0" max="100"><br>
        
        <label for="matematika">Nilai Matematika:</label>
        <input type="number" id="matematika" name="matematika" min="0" max="100"><br>
        
        <label for="dpk">Nilai DPK:</label>
        <input type="number" id="dpk" name="dpk" min="0" max="100"><br>
        
        <input type="submit" name="hitung" value="Hitung">
    </form>
    
    <?php
    if (isset($_POST['hitung'])) {
        $pabp = $_POST['pabp'];
        $matematika = $_POST['matematika'];
        $dpk = $_POST['dpk'];

        $rata_rata = ($pabp + $matematika + $dpk) / 3;

        if ($rata_rata >= 80) {
            $grade = "A";
        } elseif ($rata_rata >= 70) {
            $grade = "B";
        } elseif ($rata_rata >= 60) {
            $grade = "C";
        } elseif ($rata_rata >= 50) {
            $grade = "D";
        } else {
            $grade = "E";
        }

        echo "<h2>Hasil Penghitungan</h2>";
        echo "Nilai PABP: " . $pabp . "<br>";
        echo "Nilai Matematika: " . $matematika . "<br>";
        echo "Nilai DPK: " . $dpk . "<br>";
        echo "Rata-rata Nilai: " . $rata_rata . "<br>";
        echo "Grade: " . $grade . "<br>";
    }
    ?>
</body>
</html>
