<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylekode.css">
</head>
<body>
    <center>
    <div class="all-container2">
        <div class="container2">
            <form action="" method="post">
                <p class="title2">Kode pegawai</p>
                <input class="kode-pegawai" type="text" name="kodepegawai" placeholder="No pegawai" autocomplete="off">
                    <br><br>
                <button name="submit" tpye="submit">Kirim</button>
            </form>
        </div>

<?php
    if(isset($_POST["submit"])) {
        if(isset($_POST["kodepegawai"]) && is_numeric($_POST["kodepegawai"])) {
            $no_pegawai = ($_POST["kodepegawai"]);
            if (strlen($no_pegawai) < 11 || strlen($no_pegawai) > 11) {
                echo "<p>No pegawai tidak sesuai!<p/>";
            } else {
                $no_golongan = substr($no_pegawai, 0, 1);
                $tanggal = substr($no_pegawai, 1, 2);
                $bulan = substr($no_pegawai, 3, 2);
                $tahun = substr($no_pegawai, 5, 4);
                $no_urutan = substr($no_pegawai, 9, 2);

                if($bulan == "1") {
                    $bulan = "Januari";
                } else if ($bulan == "2") {
                    $bulan = "Februari";
                } else if ($bulan == "3") {
                    $bulan = "Maret";
                } else if ($bulan == "4") {
                    $bulan = "April";
                } else if ($bulan == "5") {
                    $bulan = "Mei";
                } else if ($bulan == "6") {
                    $bulan = "Juni";
                } else if ($bulan == "7") {
                    $bulan = "Juli";
                } else if ($bulan == "8") {
                    $bulan = "Agustus";
                } else if ($bulan == "9") {
                    $bulan = "September";
                } else if ($bulan == "10") {
                    $bulan = "Oktober";
                } else if ($bulan == "11") {
                    $bulan = "November";
                } else if ($bulan == "12") {
                    $bulan = "Desember";
                } else {
                    $bulan = "error";
                }

                if($bulan == "error") {
                    echo "<p>No pegawai tidak sesuai!</p>";
                } else {
                    $tgl_lahir ="$tanggal - $bulan - $tahun"; 
                    echo "<p style='font-family: arial; font-size: 17px; margin-top: -90px;'>No golongan: $no_golongan</p>";
                    echo "<p style='font-family: arial; font-size: 17px;'>Tanggal lahir: $tgl_lahir</p>";
                    echo "<p style='font-family: arial; font-size: 17px;'>Urutan: $no_urutan</p>";
                }
            }
        } else {
            echo "<p style='color: red; font-size: 15px; margin-top: -60px; font-style: italic;'>Masukan kode pegawai!</p>";
        }
    }
?>
</center>
</body>
</html>

