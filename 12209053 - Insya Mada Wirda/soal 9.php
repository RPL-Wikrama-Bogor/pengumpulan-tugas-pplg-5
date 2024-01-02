<?php
    $suhu_fahrenheit = $_GET['suhu_fahrenheit'] ?? 0;

    $hasil = "";

    if (is_numeric($suhu_fahrenheit) && $suhu_fahrenheit > 0) {
        $suhu_celcius = $suhu_fahrenheit / 33.8;

        if($suhu_celcius > 300){
            $hasil = "panas";
        }elseif($suhu_celcius > 250){
            $hasil = "dingin";
        }else{
            $hasil = "normal";
        }
    }
?>
 
<form action="" method="GET">
    <label for="suhu_fahrenheit">Suhu Fahrenheit</label>
    <br>
    <input type="number" name="suhu_fahrenheit" id="suhu_fahrenheit" required="required" value="<?php echo $_GET['suhu_fahrenheit'] ?? 0; ?>" />
    <br><br>

    <input type="submit" value="SUBMIT" />
    
    <p>Hasil : <?php echo $hasil ?></p>
</form>