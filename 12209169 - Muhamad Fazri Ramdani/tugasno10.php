<!DOCTYPE html>
<html>
<head>
    <title>Grade Calculator</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Grade Calculator</h1>
    
    <?php
    function calculateGrade($score) {
        if ($score >= 80 && $score <= 100) {
            return "A";
        } elseif ($score >= 75 && $score < 80) {
            return "B";
        } elseif ($score >= 65 && $score < 75) {
            return "C";
        } elseif ($score >= 45 && $score < 65) {
            return "D";
        } elseif ($score >= 0 && $score < 45) {
            return "E";
        } else {
            return "K";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nilai_pabp = $_POST["pabp"];
        $nilai_mtk = $_POST["mtk"];
        $nilai_dpk = $_POST["dpk"];
        
        $rata_rata = ($nilai_pabp + $nilai_mtk + $nilai_dpk) / 3;
        $grade = calculateGrade($rata_rata);
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="pabp">Nilai PABP : </label>
        <input type="number" id="pabp" name="pabp" step="0.01"><br><br>
        
        <label for="matematika">Nilai Mtk : </label>
        <input type="number" id="mtk" name="mtk" step="0.01"><br><br>
        
        <label for="dpk">Nilai DPK : </label>
        <input type="number" id="dpk" name="dpk" step="0.01"><br><br>
        
        <input type="submit" value="Hitung Grade">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <h2>Hasil :</h2>
        <table>
            <tr>
                <th>Pelajaran</th>
                <th>Nilai</th>
            </tr>
            <tr>
                <td>PABP</td>
                <td><?php echo $nilai_pabp; ?></td>
            </tr>
            <tr>
                <td>Mtk</td>
                <td><?php echo $nilai_mtk; ?></td>
            </tr>
            <tr>
                <td>DPK</td>
                <td><?php echo $nilai_dpk; ?></td>
            </tr>
            <tr>
                <td>Rata-rata</td>
                <td><?php echo number_format($rata_rata, 2); ?></td>
            </tr>
            <tr>
                <td>Grade</td>
                <td><?php echo $grade; ?></td>
            </tr>
        </table>
    <?php } ?>
</body>
</html>