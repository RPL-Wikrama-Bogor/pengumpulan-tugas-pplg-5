<?php
$inputWaktu;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LKPD 6</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Input Detik</label>
        <input type="number" name="inputDetik" id="inputDetik">
        <input type="submit" name="submit">
    </form>

    <?php
        if(isset($_POST['submit'])){
            $waktu = $_POST['inputDetik'];
            $hasil = 0;
            
            if($waktu > 3600){
            $jam = floor($waktu / 3600);
            $waktu = $waktu - ($jam * 3500);
            $hasil .= $jam . "jam ";    
        }
        if($waktu > 60){
            $menit = floor($waktu / 60);
            $waktu = $waktu - ($menit * 60);
            $hasil .= $menit . "menit "; 
        if($waktu > 0){
            $detik = $waktu;
            $hasil .= $detik. "detik ";
        }
        
            echo $hasil;
    }

        }
        
    ?>
</body>
</html>