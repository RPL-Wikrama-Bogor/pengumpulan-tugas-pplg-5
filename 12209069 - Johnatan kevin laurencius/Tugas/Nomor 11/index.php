<?php
    $no_pegawai;
    $no_golongan;
    $tanggal;
    $bulan;
    $tahun;
    $no_urutan;
    $tanggal_lahir;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor 11</title>
    <style>
        .container {
            width: 300px;
            height: 400px;
            margin: 100px auto;
            padding: 20px 20px 20px 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .container h2 {
            text-align: center;
            margin: 20px 0px 50px 0px;
        }
        .container h3 {
            margin: 20px 0px 20px 0px;
        }
        .container label {
            font-weight: bold;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin: 2px 0px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        input{
            width: 100%;
            padding: 10px;
            margin: 15px 0px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .container p {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Menjabarkan Nomor Pegawai</h2>
        <form action="" method="post">
            <div class="txt-field">
                <label for="no_pegawai">Nomor Pegawai</label>
                <input type="text" name="no_pegawai">
            </div>
            <input type="submit" name="submit">
        </form>
        <?php
        if(isset($_POST['submit'])) {
            ?><h3>Hasilnya</h3><?php
            $no_pegawai = $_POST['no_pegawai'];

            if(strlen($no_pegawai) < 11 || strlen($no_pegawai) > 11) {
                echo "no pegawai tidak sesuai";
            }else{
                $no_golongan = substr($no_pegawai, 0, 1);
                $tanggal = substr($no_pegawai, 1, 2);
                $bulan = substr($no_pegawai, 3, 2);
                $tahun = substr($no_pegawai, 5, 4);
                $no_urutan = substr($no_pegawai, 9, 2);

                if($bulan == "01") {
                    $bulan = " Januari ";
                }else if($bulan == "02") {
                    $bulan = " Februari ";
                }else if($bulan == "03") {
                    $bulan = " Maret ";
                }else if($bulan == "04") {
                    $bulan = " April ";
                }else if($bulan == "05") {
                    $bulan = " Mei ";
                }else if($bulan == "06") {
                    $bulan = " Juni ";
                }else if($bulan == "07") {
                    $bulan = " Juli ";
                }else if($bulan == "08") {
                    $bulan = " Agustus ";
                }else if($bulan == "09") {
                    $bulan = " September ";
                }else if($bulan == "10") {
                    $bulan = " Oktober ";
                }else if($bulan == "11") {
                    $bulan = " November ";
                }else if($bulan == "12"){
                    $bulan = " Desember ";
                }else {
                    $bulan = "error";
                }
                if($bulan == "error"){
                    echo "no pegawai tidak sesuai";
                }else {
                    $tanggal_lahir = $tanggal . $bulan . $tahun;
                    echo "<p> Nomor Golongan = $no_golongan <br> Tanggal Lahir = $tanggal_lahir <br> Nomor Urutan = $no_urutan</p>";
                }
            }
            
        }
    ?>
    </div>
</body>
</html>