<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            padding: 50px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }
        form {
            text-align: center;
        }
        input[type="number"] {
            padding: 10px;
            width: 100%;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <input type="number" name="nopeg" id="" placeholder="No pegawai" minlength="11" maxlength="11" required>
            <br><br>
            <input type="submit" value="Submit">
        </form>
        <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $no_pgw = $_POST['nopeg'];
    
        function getMonthName($monthCode) {
            if ($monthCode === "01") {
                return "Januari";
            } else if ($monthCode === "02") {
                return "Februari";
            } else if ($monthCode === "03") {
                return "Maret";
            } else if ($monthCode === "04") {
                return "April";
            } else if ($monthCode === "05") {
                return "Mei";
            } else if ($monthCode === "06") {
                return "Juni";
            } else if ($monthCode === "07") {
                return "Juli";
            } else if ($monthCode === "08") {
                return "Agustus";
            } else if ($monthCode === "09") {
                return "September";
            } else if ($monthCode === "10") {
                return "Oktober";
            } else if ($monthCode === "11") {
                return "November";
            } else if ($monthCode === "12") {
                return "Desember";
            } else {
                return "Bulan Tidak Valid";
            }
        }        
    }
    if (strlen($no_pgw) === 11) {
        $golongan = $no_pgw[0];
        $tanggal = substr($no_pgw, 1, 2);
        $bulan = substr($no_pgw, 3, 2);
        $tahun = substr($no_pgw, 5, 4);
        $nomorUrut = substr($no_pgw, 9, 2);
        $bulanLahir = getMonthName($bulan);
        echo "Nomor Golongan: $golongan<br>";
        echo "Tanggal Lahir: $tanggal $bulanLahir $tahun<br>";
        echo "Nomor Urut: $nomorUrut";
    } else {
        echo "Nomor Pegawai harus memiliki 11 angka.";
    }

    
?>
    </div>
</body>
</html>