<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="nama">Masukan nama:</label><br>
            <input type="text" id="nama" name="nama" required autofocus><br><br>

            <label for="nilai_pabp">Nilai pabp:</label><br>
            <input type="number" id="nilai_pabp" name="nilai_pabp" required ><br><br>
            
            <label for="nilai_mtk">Nilai_mtk:</label><br>
            <input type="number" id="nilai_mtk" name="nilai_mtk" required><br><br>
    
            <label for="nilai_dpk">Nilai_dpk:</label><br>
            <input type="number" id="nilai_dpk" name="nilai_dpk" required><br><br>
            
            <button name="submit">Submit</button> <br>
    
</form>
<?php
    if (isset($_POST["submit"])) {
        $nama = $_POST['nama'];
        $pabp = $_POST['nilai_pabp'];
        $mtk = $_POST['nilai_mtk'];
        $dpk = $_POST['nilai_dpk'];

        $rata_rata = ($pabp + $mtk + $dpk) / 3;


        if ($rata_rata <= 100 && $rata_rata >= 80) {
            $predikat = "A";
        } elseif ($rata_rata <= 80 && $rata_rata >= 75) {
            $predikat = "B";
        } elseif ($rata_rata <= 75 && $rata_rata >= 65) {
            $predikat = "C";
        } elseif ($rata_rata <= 65 && $rata_rata >= 45) {
            $predikat = "D";
        } elseif ($rata_rata <= 45 && $rata_rata >= 0) {
            $predikat = "E";
        } else {
            $predikat = "Angka tidak memenuhi persyaratan";
        }
    ?>
    <h1>Hasil Penilaian</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Nilai Huruf</th>
        </tr>
        <tr>
            <td><?php echo $nama; ?></td>
            <td><?php echo $predikat; ?></td>
        </tr>
    </table>
    <?php
    } else {
        echo "Data tidak dikirimkan.";
    }
    ?>
   
</body>
</html>