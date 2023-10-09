<?php
session_start(); 

if (!isset($_SESSION['loop'])) {
    $_SESSION['loop'] = 0; 
    $_SESSION['max'] = null;
    $_SESSION['min'] = null;
    $_SESSION['total'] = 0;
    $_SESSION['entryCount'] = 0;
}

if ($_SESSION['loop'] >= 20) {
    session_destroy();
    echo "<p>Anda telah mencapai batas 20 kali input.</p>";
} else {
    ?>
    <center>
    <div class="card" style="width:23rem; padding: 4rem; margin-top:9rem;">
    <form method="post" action="">
        <label>Masukkan angka:</label>
        <input type="number" name="angka" class="form-control">
        <button type="submit" value="Cari Tertinggi" class="btn btn-primary" style="margin-top:2rem;">kirim</button> 
        <br>
        <a href="soal-no-16.php">Soal Sebelumnya</a>
        <br>
        <a href="soal-no-18.php">Soal Berikutnya</a>
    </form>

    <?php

    if(isset($_POST['angka'])) {
        $input = $_POST['angka'];

        if (!isset($_SESSION['max']) || $input > $_SESSION['max']) {
            $_SESSION['max'] = $input;
        }

        if (!isset($_SESSION['min']) || $input < $_SESSION['min']) {
            $_SESSION['min'] = $input;
        }

        $_SESSION['total'] += $input;
        $_SESSION['entryCount']++;

        echo "<p>Nilai tertinggi saat ini adalah: {$_SESSION['max']}</p>";
        echo "<p>Nilai terkecil saat ini adalah: {$_SESSION['min']}</p>";

        if ($_SESSION['entryCount'] > 0) {
            $average = $_SESSION['total'] / $_SESSION['entryCount'];
            echo "<p>Rata-rata nilai saat ini adalah: $average</p>";
        }

        $_SESSION['loop']++;
    }
}
?>
</div></center>