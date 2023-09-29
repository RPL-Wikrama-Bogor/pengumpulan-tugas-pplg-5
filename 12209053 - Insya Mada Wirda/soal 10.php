<?php
    $nilai_pabp = $_GET['nilai_pabp'] ?? null;
    $nilai_mtk = $_GET['nilai_mtk'] ?? null;
    $nilai_dpk = $_GET['nilai_dpk'] ?? null;
    
    $hasil = "";
    
    if (is_numeric($nilai_pabp) && is_numeric($nilai_mtk) && is_numeric($nilai_dpk) ) {
        $rata_rata = ($nilai_pabp + $nilai_mtk + $nilai_dpk) / 3;

        if($rata_rata <= 100 && $rata_rata >= 80){
            $hasil = "A";
        }elseif($rata_rata <= 80 && $rata_rata >= 75){
            $hasil = "B";
        }elseif($rata_rata <= 75 && $rata_rata >= 65){
            $hasil = "C";
        }elseif($rata_rata <= 65 && $rata_rata >= 45){
            $hasil = "D";
        }elseif($rata_rata <= 45 && $rata_rata >= 0){
            $hasil = "E";
        }else{
            $hasil = "angka tidak memenuhi persyaratan";
        }
    }
?>
 
<form action="" method="GET">
    <label for="nilai_pabp">Nilai PABP</label>
    <br>
    <input type="number" name="nilai_pabp" id="nilai_pabp" required="required" value="<?php echo $_GET['nilai_pabp'] ?? 0; ?>" />
    <br><br>
    
    <label for="nilai_mtk">Nilai MTK</label>
    <br>
    <input type="number" name="nilai_mtk" id="nilai_mtk" required="required" value="<?php echo $_GET['nilai_mtk'] ?? 0; ?>" />
    <br><br>
    
    <label for="nilai_dpk">Nilai DPKK</label>
    <br>
    <input type="number" name="nilai_dpk" id="nilai_dpk" required="required" value="<?php echo $_GET['nilai_dpk'] ?? 0; ?>" />
    <br><br>

    <input type="submit" value="SUBMIT" />
    
    <p>Hasil : <?php echo $hasil ?></p>
</form>