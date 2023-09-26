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
    <title>Soal 6</title>
</head>
<body>

    <h2>Mengkonversi Total Detik ke Bentuk Jam dan Menit</h2>

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