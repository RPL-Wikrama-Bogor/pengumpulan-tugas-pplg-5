<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LKPD 11</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #352F44;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .container h1{
            text-align: center;
        }

        .container p{
            text-align: center;
            font-size: 12px;
            color: red;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label, input, button {
            margin-bottom: 10px;
        }
        button{
            background-color: #0E21A0;
            color: #ffffff;
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border: none;
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Input No Pegawai</h1>
        <p>Harap memasukan no pegawai dengan benar</p>
        <form action="" method="post">
            <label for="noPegawai">Input No Pegawai</label>
            <input type="text" name="noPegawai" id="noPegawai">
            <button type="submit" name="submit">Submit</button>
        </form>

        <?php 
        if(isset($_POST['submit'])){
            $no_pegawai = $_POST['noPegawai'];
            
            if( strlen($no_pegawai) < 11 || strlen($no_pegawai) > 11){ 
                echo "no pegawai tidak sesuai";
            }
            else{
                $no_golongan = substr($no_pegawai, 0, 1);
                $tanggal = substr($no_pegawai, 1, 2);
                $bulan = substr($no_pegawai, 3, 2 );
                $tahun = substr($no_pegawai, 5, 4);
                $no_urutan = substr($no_pegawai, 9, 2);

            if($bulan == "01"){
                $bulan = "Januari";
            } 
            else if($bulan == "02"){
                $bulan = "Febuari";
            }
            else if($bulan == "03"){
                $bulan = "Maret";
            }
            else if($bulan == "04"){
                $bulan = "April";
            }
            else if($bulan == "05"){
                $bulan = "Mei";
            }
            else if($bulan == "06"){
                $bulan = "Juni";
            }
            else if($bulan == "07"){
                $bulan = "Juli";
            }
            else if($bulan == "08"){
                $bulan = "Agustus";
            }
            else if($bulan == "09"){
                $bulan = "September";
            }
            else if($bulan == "10"){
                $bulan = "Oktober";
            }
            else if($bulan == "11"){
                $bulan = "November";
            }
            else if($bulan == "12"){
                $bulan = "Desember";
            }else{
                $bulan = "error"; 
            }

            if($bulan == "error"){
                echo "input bulan kelebihan";
            }else{   
                $tanggal_lahir = $tanggal. " ". $bulan. " " . $tahun;
                echo "no golongan : ". $no_golongan. "<br> Tanggal Lahir : ".  $tanggal_lahir."<br> no urutan : ". $no_urutan;
            }
        }
    }
    ?>
</body>
</html>