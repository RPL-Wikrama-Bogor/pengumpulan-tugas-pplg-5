<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <label for="totaldetik">
        <input type="number" name="totaldetik"><br><br>
        
            <button name="submit">Submit</button> <br>

    </form>
</body>
</html> -->

<!-- <?php


if(isset($_POST['submit'])){
    
    $totalDetik = $_POST['totaldetik'];
   
    
   



$jumlahJam = floor($totalDetik / 3600);
$sisaDetik = $totalDetik % 3600;
$jumlahMenit = floor($sisaDetik / 60);
$sisaDetik = $sisaDetik % 60;

echo "Hasil konversi: $jumlahJam jam $jumlahMenit menit $sisaDetik detik\n";

    
    
    
    }
    
    
    
    
    
    ?> -->

<?php
    $jam = 0;
    $menit = 0;
    $detik = 0;
    $total = 0;
    $sisa1 = 0;
    $sisa2 = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Detik ke Jam, Menit, dan Detik</title>
</head>
<body>


    <form method="post" action="#">
        <table>
            <tr>
                <td>Waktu</td>
                <td>   :   </td>
                <td><input type="text" name="total"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Hitung">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['submit'])) {

        $total = $_POST['total'];
        if ( $total >= 3600) {

            $sisa1= $total % 3600;
            $jam = ($total - $sisa1) / 3600;
            
            if ($total >= 60 ) {
                $sisa2 = $sisa1 % 60;
                $menit = ($sisa1 - $sisa2) / 60;

                $detik = $sisa2;
            }
            else {
                $detik = $sisa1;
            }
        }

        elseif ($total >= 60) {
            $sisa1 = $total % 60;
            $menit = ($total - $sisa1) / 60;

            $detik = $sisa1;
        }

        else {
            $detik = $total;
        }

        echo "$jam jam $menit menit $detik detik";
    }
    ?>
    
</body>
</html>