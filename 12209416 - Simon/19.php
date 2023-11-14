<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngitung tiket</title>
</head>
<body>
    <style>
  body {
            font-family: Arial, sans-serif;
        }

        form {
            margin:auto;
            text-align: center; 
            background-color:lightblue;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
        }

        tr {
            margin-bottom: 10px;
        }

        td {
            padding: 5px;
        }

        input[type="number"] {
            width: 100%;
            padding: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
            
        }
       



    </style>
    <form method="post" action="">
        <table>
            <tr>
                <td>Tiket VIP</td>
                <td><input type="text" name="jumlah_tiket_VIP"></td>
                <td>Tiket Eksekutif</td>
                <td><input type="text" name="jumlah_tiket_Eksekutif"></td>
                <td>Tiket Ekonomi</td>
                <td><input type="text" name="jumlah_tiket_Ekonomi"></td>
            </tr>
            <tr>
                <td colspan="6"><input type="submit" value="Submit" name="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>




<?php
$total_profit = 0;
$total_tickets = 0;

if (isset($_POST['submit'])) {
    $jumlah_tiket_VIP = $_POST['jumlah_tiket_VIP'];
    $jumlah_tiket_Eksekutif = $_POST['jumlah_tiket_Eksekutif'];
    $jumlah_tiket_Ekonomi = $_POST['jumlah_tiket_Ekonomi'];

    $total_tickets = $jumlah_tiket_VIP + $jumlah_tiket_Eksekutif + $jumlah_tiket_Ekonomi;

    if ($jumlah_tiket_VIP >= 35) {
        $keuntungan_VIP = 0.25 * $jumlah_tiket_VIP;
    } elseif ($jumlah_tiket_VIP >= 20) {
        $keuntungan_VIP = 0.15 * $jumlah_tiket_VIP;
    } else {
        $keuntungan_VIP = 0.05 * $jumlah_tiket_VIP;
    }

    if ($jumlah_tiket_Eksekutif >= 40) {
        $keuntungan_Eksekutif = 0.20 * $jumlah_tiket_Eksekutif;
    } elseif ($jumlah_tiket_Eksekutif >= 20) {
        $keuntungan_Eksekutif = 0.10 * $jumlah_tiket_Eksekutif;
    } else {
        $keuntungan_Eksekutif = 0.02 * $jumlah_tiket_Eksekutif;
    }

    $keuntungan_Ekonomi = 0.07 * $jumlah_tiket_Ekonomi;

    $total_profit = $keuntungan_VIP + $keuntungan_Eksekutif + $keuntungan_Ekonomi;

    echo "Keuntungan VIP: " . $keuntungan_VIP . " (" . round(($keuntungan_VIP / $total_profit) * 100) . "%)</br>";
    echo "Keuntungan Eksekutif: " . $keuntungan_Eksekutif . " (" . round(($keuntungan_Eksekutif / $total_profit) * 100) . "%)</br>";
    echo "Keuntungan Ekonomi: " . $keuntungan_Ekonomi . " (" . round(($keuntungan_Ekonomi / $total_profit) * 100) . "%)</br>";
    echo "Total Keuntungan: " . $total_profit ." (" . round(($total_profit / 3) * 100) . "%)</br>";
    echo "Jumlah Tiket VIP: " . $jumlah_tiket_VIP . "</br>";
    echo "Jumlah Tiket Eksekutif: " . $jumlah_tiket_Eksekutif . "</br>";
    echo "Jumlah Tiket Ekonomi: " . $jumlah_tiket_Ekonomi . "</br>";
    echo "Total Tiket: " . $total_tickets . "</br>";
}
?>
