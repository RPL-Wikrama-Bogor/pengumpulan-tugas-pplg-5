<?php
    $pabp;
    $mtk;
    $dpk;
    $rata_rata;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 10 </title>
</head>
<body>
    <h2>Menentukan Grade dari Nilai Akhir</h2>

    <form method="post" action="#">
        <table>
            <tr>
                <td>Nilai PABP</td>
                <td>  :  </td>
                <td><input type="number" name="pabp"></td>
            </tr>
            <tr>
                <td>Nilai MTK</td>
                <td>  :  </td>
                <td><input type="number" name="mtk"></td>
            </tr>
            <tr>
                <td>Nilai DPK</td>
                <td>  :  </td>
                <td><input type="number" name="dpk"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="hasil"></td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $pabp = $_POST["pabp"];
        $mtk = $_POST["mtk"];
        $dpk = $_POST["dpk"];

        $rata_rata = ($pabp + $mtk + $dpk) / 3;
        echo $rata_rata;
        echo "<br>";

        if ($rata_rata <= 100 && $rata_rata >=80) {
            echo "Grade = A";
            echo "<br>";
            echo "Dengan Nilai Rata Rata = $rata_rata";
        }
        elseif ($rata_rata <80 && $rata_rata >= 75) {
            echo "Grade = B";
            echo "<br>";
            echo "Dengan Nilai Rata-Rata = $rata_rata";
        }
        elseif ($rata_rata <75 && $rata_rata >= 65) {
            echo "Grade = C";
            echo "<br>";
            echo "Dengan Nilai Rata-Rata = $rata_rata";
        }
        elseif ($rata_rata <65 && $rata_rata >= 45) {
            echo "Grade = D";
            echo "<br>";
            echo "Dengan Nilai Rata-Rata = $rata_rata";
        }
        elseif ($rata_rata <45 && $rata_rata >= 0) {
            echo "Grade = E";
            echo "<br>";
            echo "Dengan Nilai Rata-Rata = $rata_rata";
        }
        else {
            echo "angka tidak memenuhi persyaratan";
        }
    }
    ?>
    
</body>
</html>