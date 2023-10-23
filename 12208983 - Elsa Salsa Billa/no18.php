<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Penambahan Detik</title>
</head>
<body> 

<style>
    body {
        background-color: #AEC3AE;
    }

    .card {
        background-color: #f2f2f2;
        border-radius: 10px;
        width: 30%;
        height: 450px;
        margin-top: 100px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        padding: 10px;
    }

    @media screen and (max-width: 337px) {
        .card {
            width: 75%;
            position: relative;
            margin: 30px;
            margin-top: 75px;
        }
    }
</style>

    <?php
    session_start();

    if (!isset($_SESSION['loop'])) {
        $_SESSION['loop'] = 0; 
        $_SESSION['tertinggi'] = null; 
        $_SESSION['juara'] = null;
    }

    if ($_SESSION['loop'] >= 15) {
        session_destroy();
        echo "<p>Anda telah mencapai batas 10 kali input.</p>";
    } else {
        ?>
        
        <center>     
        <div class="card">
        <h2>Mencari Nilai Tertinggi</h2>
        <form method="post" action="">
            <label>Nama Siswa:</label><br>
            <input type="text" name="nama" >
            <br>
            <label>Matematika:</label><br>
            <input type="number" name="mtk" >
            <br>
            <label>Bahasa Indonesia:</label><br>
            <input type="number" name="indo" >
            <br>
            <label>Bahasa Inggris:</label><br>
            <input type="number" name="inggris" >
            <br>
            <label>DPK:</label><br>
            <input type="number" name="dpk" >
            <br>
            <label>PABP:</label><br>
            <input type="number" name="pabp" >
            <br>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>

</body>
</html>

        <?php

        if(isset($_POST['nama']) && isset($_POST['mtk']) && isset($_POST['indo']) && isset($_POST['inggris']) && isset($_POST['dpk']) && isset($_POST['pabp'])) {
            $nama = $_POST['nama'];
            $mtk = $_POST['mtk'];
            $indo = $_POST['indo'];
            $inggris = $_POST['inggris'];
            $dpk = $_POST['dpk'];
            $pabp = $_POST['pabp'];

         
            $rata = ($mtk + $indo + $inggris + $dpk + $pabp) / 5;

            if (!isset($_SESSION['tertinggi']) || $rata > $_SESSION['tertinggi']) {
                $_SESSION['tertinggi'] = $rata;
                $_SESSION['juara'] = $nama;
            }

            echo "<p>Rata-rata tertinggi saat ini adalah: {$_SESSION['tertinggi']}</p>";
            echo "<p>Siswa dengan rata-rata tertinggi adalah: {$_SESSION['juara']}</p>";

            $_SESSION['loop']++; 
        }
    }
  
    ?>
