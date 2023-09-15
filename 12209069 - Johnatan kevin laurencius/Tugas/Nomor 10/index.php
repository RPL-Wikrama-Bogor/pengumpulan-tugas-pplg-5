<?php
    $nilai_pabp = 0;
    $nilai_mtk = 0;
    $nilai_dpk = 0;
    $rata_rata = 0;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No 10</title>
</head>
<body>
    <form action="" method="post">
        <label for="nilai_pabp">Nilai PABP</label>
        <input type="number" name="nilai_pabp">
        <br><br>
        <label for="nilai_mtk">Nilai MTK</label>
        <input type="number" name="nilai_mtk">
        <br><br>
        <label for="nilai_dpk">Nilai DPK</label>
        <input type="number" name="nilai_dpk">
        <br><br>
        <input type="submit" name="submit">
    </form>

    <?php
        if(isset($_POST['submit'])) {
            $nilai_pabp = $_POST['nilai_pabp'];
            $nilai_mtk = $_POST['nilai_mtk'];
            $nilai_dpk = $_POST['nilai_dpk'];

            $rata_rata = ($nilai_pabp + $nilai_mtk + $nilai_dpk) / 3;

            if($rata_rata <= 100 && $rata_rata >= 80) {
                echo "A";
            }else if($rata_rata <= 80 && $rata_rata >= 75) {
                echo "B";
            }else if($rata_rata <= 75 && $rata_rata >= 65) {
                echo "C";
            }else if($rata_rata <= 65 && $rata_rata >= 45) {
                echo "D";
            }else if($rata_rata <= 45 && $rata_rata >= 0) {
                echo "E";
            }else{
                echo "angka tidak memenuhi persyaratan";
            }
        }
    ?>
</body>
</html>