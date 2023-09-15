<?php
    $waktu = $_GET['waktu'] ?? null;

    $hasil = "";

    if (is_numeric($waktu)) {
        if($waktu > 3600){
            $jam = $waktu / 3600;
            $waktu = $waktu - ($jam * 3600);
            $hasil .= $jam . " jam";
        }elseif($waktu > 60){
            $menit = $waktu / 60;
            $waktu = $waktu - ($menit * 60);
            $hasil .= $menit . " menit";
        }else{
            $detik = $waktu;
            $hasil .= $detik . " detik";
        }
    }
?>
 
<form action="" method="GET">
    <label for="waktu">Waktu</label>
    <br>
    <input type="number" name="waktu" id="waktu" required="required" value="<?php echo $_GET['waktu'] ?? 0; ?>" />
    <br><br>

    <input type="submit" value="SUBMIT" />
    
    <p>Hasil : <?php echo $hasil ?></p>
</form>