<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No.11</title>
    <style>
        body {
            background-color: #333;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container-left {
            background-color: #444;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            margin-right: 10px;
            width: 40%;
        }

        .container-left label,
        .container-left input {
            display: block;
            margin-bottom: 10px;
        }

        .container-left .text {
            width: 100%;
            padding: 5px;
            border: none;
            background-color: #555;
            color: white;
        }

        .container-left .submit {
            background-color: white;
            color: #222;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .container-right {
            background-color: #333;
            padding: 10px;
            border-radius: 5px;
            width: 40%;
        }

        .container-right p {
            color: white;
            padding: 5px;
            text-align: center;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="container-left">
            <form action="" method="post">
                <label for="no_pegawai">Input No-Pegawai: </label>
                <input type="text" class="text" name="no_pegawai" id="no_pegawai" required>
                <input type="submit" name="submit" class="submit">
            </form>
        </div>

        <div class="container-right">
            <!-- <h3> hasil Inputan: </h3> -->
            <?php
            if (isset($_POST['submit'])) {
                $no_pegawai = $_POST['no_pegawai'];

                if (strlen($no_pegawai) < 11 || strlen($no_pegawai) > 11) {
                    echo '<p> Input harus 11 Digit! <p>';
                }

                $no_golongan = substr($no_pegawai, 0, 1);
                $tanggal = substr($no_pegawai, 1, 2);
                $bulan = substr($no_pegawai, 3, 2);
                $tahun = substr($no_pegawai, 5, 4);
                $no_urutan = substr($no_pegawai, 9, 2);

                if ($bulan == '01') {
                    $bulan = 'Januari';
                } else if ($bulan == '02') {
                    $bulan = 'Februari';
                } else if ($bulan == '03') {
                    $bulan = 'Maret';
                } else if ($bulan == '04') {
                    $bulan = 'April';
                } else if ($bulan == '05') {
                    $bulan = ' Mei ';
                } else if ($bulan == '06') {
                    $bulan = 'Juni';
                } else if ($bulan == '07') {
                    $bulan = 'Juli';
                } else if ($bulan == '08') {
                    $bulan = 'Agustus';
                } else if ($bulan == '09') {
                    $bulan = 'September';
                } else if ($bulan == '10') {
                    $bulan = 'Oktober';
                } else if ($bulan == '11') {
                    $bulan = 'November';
                } else if ($bulan == '12') {
                    $bulan = 'Desember';
                } else {
                    $bulan = 'error';
                }


                if ($bulan == 'error') {
                    echo 'Bulan Maksimal 12';
                } else {
                    $tanggal_lahir = $tanggal . $bulan . $tahun;

                    echo '<h3> hasil Inputan: </h3> <br>';
                    echo '<p> No Golongan: ' . $no_golongan . '<br>
                    Tanggal Lahir: ' . $tanggal_lahir . '<br> 
                    No Urutan: ' . $no_urutan . '<br> </p>';
                }
            }
            ?>
        </div>
    </div>
</body>

</html>