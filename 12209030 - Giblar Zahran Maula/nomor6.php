<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<body>
    

<!-- djfdkjsf -->

    
    <?php
    session_start(); 

    if (!isset($_SESSION['loop'])) {
        $_SESSION['loop'] = 0; 
        $_SESSION['max'] = null;
    }

    if ($_SESSION['loop'] >= 10) {
        session_destroy();
        echo "<p>Anda telah mencapai batas 10 kali input.</p>";
    } else {
        ?>
        <center>
        <div class="card" style="width:23rem; padding: 4rem; margin-top:9rem;">
        <form method="post" action="">
            <label>Masukkan angka:</label>
            <input type="number" name="angka" class="form-control">
            <button type="submit" value="Cari Tertinggi" class="btn btn-dark" style="margin-top:2rem; width:100%;">kirim</button> 
        </form>
   
        <?php

        if(isset($_POST['angka'])) {
            $input = $_POST['angka'];

            if (!isset($_SESSION['max']) || $input > $_SESSION['max']) {
                $_SESSION['max'] = $input;
            }

            echo "<p>Nilai tertinggi saat ini adalah: {$_SESSION['max']}</p>";

            $_SESSION['loop']++;
        }
    }
    ?>

 </div></center>
<!-- dfjdkjfskfj -->
</body>
</html>