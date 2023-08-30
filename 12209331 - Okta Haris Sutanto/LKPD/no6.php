<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <label for="totaldetik">Detik:</label><br>
            <input type="number" id="totaldetik" name="totaldetik" required autofocus><br><br>
            
            <button name="submit">Submit</button> <br>
    
        </form>
    <?php

    if( isset($_POST["submit"])) {
        // floor tuh buat bulatin angkanya tapi kebawah
        // ini buat manggil inputan diatas
        $totalDetik = $_POST['totaldetik'];


    $Jam = floor($totalDetik / 3600);
    $sisaDetik = $totalDetik % 3600;     
    $Menit = floor($sisaDetik / 60);
    $sisaDetik = $sisaDetik % 60;

        echo "$Jam jam $Menit menit $sisaDetik detik\n";
    }

    ?>
    
</body>
</html>