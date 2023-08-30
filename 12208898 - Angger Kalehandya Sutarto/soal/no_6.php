<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomer 6</title>
</head>
<body>
    <h2>Konversi Detik ke Jam-Menit_Detik</h2>
    <form action="" method="post">
        <label for="detik">Input Waktu Detik: </label>
        <input type="number" name="detik" id="detik">
        <input type="submit" name="submit">
    </form>

    <?php 
    if(isset($_POST['submit'])){
        if (isset($_POST['submit'])) {
            $waktu = $_POST['detik'];
            $hasil = 0;
        
            if ($waktu >= 3600) {
              $jam = floor($waktu / 3600);
              $waktu = $waktu - ($jam * 3600);
              $hasil .= $jam . " jam ";
            }
            if ($waktu >= 60) {
              $menit = floor($waktu / 60);
              $waktu = $waktu - ($menit * 60);
              $hasil .= $menit . " menit ";
            }
            if ($waktu > 0) {
              $detik = $waktu;
              $hasil .= $detik . " detik";
            }
        
            echo "<p>Hasil konversi: " . $hasil . "</p>";
          }
        
}
    
    ?>
</body>
</html>