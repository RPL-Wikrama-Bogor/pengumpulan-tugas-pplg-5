<?php
    $nilai_pabp;
    $nilai_mtk;
    $nilai_dpk;
    $rata_rata;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menentukan grade</title>
</head>
<body>
    <h1>Menentukan grade</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>Nilai Pabp</td>
                <td></td>
                <td><input type="number" name="pabp"></td>
            </tr>
            <tr>
                <td>Nilai mtk</td>
                <td></td>
                <td><input type="number" name="mtk"></td>
            </tr>
            <tr>
                <td>Nilai dpk</td>
                <td></td>
                <td><input type="number" name="dpk"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="cari" name="submit"></td>
            </tr>
        </table>
    </form>
    <br>

    <?php
        if(isset($_POST['submit'])){
            $nilai_pabp = $_POST['pabp'];
            $nilai_mtk = $_POST['mtk'];
            $nilai_dpk = $_POST['dpk'];

            $rata_rata = ($nilai_pabp + $nilai_mtk + $nilai_dpk)/3;

            if ($rata_rata <= 100 && $rata_rata >= 80){
                echo "Grade A";
            }
            else if ($rata_rata <= 80 && $rata_rata >= 75){
                echo "Grade B";
            }
            else if ($rata_rata <= 75 && $rata_rata >= 60){
                echo "Grade C";
            }
            else if ($rata_rata <= 65 && $rata_rata >= 45){
                echo "Grade D";
            }
            else if ($rata_rata <= 45 && $rata_rata >= 0){
                echo "Grade E";
            }
            else {
                echo "Angka tidak memenuhi persyaratan";
            }
        }

    ?>

</body>
</html>