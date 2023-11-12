<?php
    $no_pegawai;
    $length;
    $no_golongan;
    $tanggal;
    $bulan;
    $tahun;
    $no_urutan;
    $tangal_lahir;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 11</title>
    <style>
        body{
            margin: 10px 15rem;
            background-color: #D8C4B6;
        }
        h2{
            text-align: center;
            background-color: #F5EFE7;
            margin: 10px;
            padding: 3rem 7rem;
            border-radius: 10px;
        }

        form{
            padding: 20px;
            margin: 20px 10px;
            background-color: #F5EFE7;
            border-radius: 10px;
        }
        .isi{
            background-color:  #F5EFE7;
            margin: 20px 10px;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h2>Kode Pegawai</h2>

    <form method="post" action="#">
        <table>
            <tr>
                <td>Kode Pegawai</td>
                <td>  :  </td>
                <td><input type="number" name="no_pegawai"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="kirim"></td>
            </tr>
        </table>
    </form>
    
    <?php
        if (isset($_POST['submit'])) {
            $no_pegawai = $_POST ['no_pegawai'];
            $length = strlen($no_pegawai);

            if ($length == 11) {
                $no_golongan = substr($no_pegawai, 0, 1);
                $tanggal = substr($no_pegawai, 1, 2);
                $bulan = substr($no_pegawai, 3, 2);
                $tahun = substr($no_pegawai, 5, 4);
                $no_urutan = substr($no_pegawai, 9, 2);

                if ($tanggal <=31 && $tanggal >=1) {
                    $tanggal = $tanggal;
                }
                else {
                    $tanggal = "(error)";
                }

                if ($bulan == "01") {
                    $bulan = "Januari";
                }elseif ($bulan == "02") {
                    $bulan = "Februari";
                }elseif ($bulan == "03") {
                    $bulan = "Maret";
                }elseif ($bulan == "04") {
                    $bulan = "April";
                }elseif ($bulan == "05") {
                    $bulan = "Mei";
                }elseif ($bulan == "06") {
                    $bulan = "Juni";
                }elseif ($bulan == "07") {
                    $bulan = "Juli";
                }elseif ($bulan == "08") {
                    $bulan = "Agustus";
                }elseif ($bulan == "09") {
                    $bulan = "September";
                }elseif ($bulan == "10") {
                    $bulan = "Oktober";
                }elseif ($bulan == "11") {
                    $bulan = "November";
                }elseif ($bulan == "12") {
                    $bulan = "Desember";
                }else {
                   $bulan = "(error)";
                }

                $tangal_lahir = $tanggal." " .$bulan. " ". $tahun;
            }
            else {
                echo "Kode Pegawai Tidak Sesuai";
            }
    ?>

    <div class= "isi">
    <?php
            echo"Kode Pegawai= $no_pegawai";
            echo "<br>";
            echo "Golongan Pegawai= $no_golongan";
            echo "<br>";
            echo "Tanggal Lahir = $tangal_lahir";
            echo "<br>";
            echo "Nomor Urut  = $no_urutan";
            echo "<br>";
        }
    ?>
        </div>
</body>
</html>
