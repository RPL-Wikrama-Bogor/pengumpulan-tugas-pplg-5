<!DOCTYPE html>
<html>
<head>
    <title>Cari Juara Kelas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label, input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #02090e;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        h2 {
            margin-top: 20px;
        }

        p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Cari Juara Kelas</h1>
    
    <?php
    $total_students = 15;
    $subjects = array("MTK", "INDO", "INGG", "DPK", "Agama");

    $student_name = isset($_POST["student_name"]) ? $_POST["student_name"] : "";
    $attendance = isset($_POST["attendance"]) ? intval($_POST["attendance"]) : 0;
    $subject_scores = array();

    foreach ($subjects as $subject) {
        $subject_scores[$subject] = isset($_POST[$subject]) ? intval($_POST[$subject]) : 0;
    }

    $average_score = array_sum($subject_scores) / count($subject_scores);

    $result = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($attendance === 100 && $average_score >= 475) {
            $result = "☺Juara Kelas";
        } else {
            $result = "☹Anda Bukan Juara Kelas";
        }
    }
    ?>

       
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="student_name">Nama Siswa:</label>
        <input type="text" id="student_name" name="student_name" value="<?php echo $student_name; ?>"><br>
        
        <label for="attendance">Kehadiran (%):</label>
        <input type="number" id="attendance" name="attendance" value="<?php echo $attendance; ?>"><br>
        
        <?php foreach ($subjects as $subject) { ?>
            <label for="<?php echo $subject; ?>"><?php echo $subject; ?>:</label>
            <input type="number" id="<?php echo $subject; ?>" name="<?php echo $subject; ?>" value="<?php echo isset($subject_scores[$subject]) ? $subject_scores[$subject] : 0; ?>"><br>
        <?php } ?>
        
        <input type="submit" value="Cari Juara">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <h2>Hasil :</h2>
        <p>Nama Siswa : <?php echo $student_name; ?></p>
        <p>Kehadiran : <?php echo $attendance; ?>%</p>
        <p>Nilai Rata-rata : <?php echo $average_score; ?></p>
        <p><?php echo $result; ?></p>
    <?php } ?>
</body>
</html>