</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: blanchedalmond;
        }

        .container {
            max-width: 600px;
            margin:  auto;
            padding: 10px;
            
        }

        form {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        tr {
            margin-bottom: 10px;
        }

        td {
            padding: 5px;
            color: black;
        }

        input[type="number"] {
            width: 100%;
            padding: 5px;
        }

        input[type="submit"] {
            background-color: brown;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: black;
        }

        .result {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <form method="POST" action="">
        <tr>
            <td>No Pegawai</td>
            <td><input type="number" value="kode pegawai" name="bilangan"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Submit" name="submit"></td>
        </tr>
    </form>
    <?php

if (isset($_POST['submit'])) {
    $kodepegawai = $_POST['bilangan'];
    $golongan = substr($kodepegawai, 0, 1);
    $tanggal = substr($kodepegawai, 1, 2);
    $bulan = substr($kodepegawai, 3, 2);
    $tahun = substr($kodepegawai, 5, 4);
    $urutan = substr($kodepegawai, 9, 2);

    if (strlen($kodepegawai) <  11 OR strlen($kodepegawai) > 11) {
        echo "nomor pegawai tidak sesuai";
    } else {
        $nama_bulan = "";

        if ($bulan == "01") {
            $nama_bulan = "Januari";
        } elseif ($bulan == "02") {
            $nama_bulan = "Februari";
        } elseif ($bulan == "03") {
            $nama_bulan = "Maret";
        } elseif ($bulan == "04") {
            $nama_bulan = "April";
        } elseif ($bulan == "05") {
            $nama_bulan = "Mei";
        } elseif ($bulan == "06") {
            $nama_bulan = "Juni";
        } elseif ($bulan == "07") {
            $nama_bulan = "Juli";
        } elseif ($bulan == "08") {
            $nama_bulan = "Agustus";
        } elseif ($bulan == "09") {
            $nama_bulan = "September";
        } elseif ($bulan == "10") {
            $nama_bulan = "Oktober";
        } elseif ($bulan == "11") {
            $nama_bulan = "November";
        } elseif ($bulan == "12") {
            $nama_bulan = "Desember";
        }

        $tanggal_lahir = "$tanggal $nama_bulan $tahun";

        echo "Nomor Golongan: $golongan<br>";
        echo "Tanggal Lahir: $tanggal_lahir <br>";
        echo "Nomor Urut Pegawai: $urutan<br>";
    }
}
?>    
</div>
</body>
<style>
 @media (max-width: 768px)
 {



}

 


    </style>
</html>
