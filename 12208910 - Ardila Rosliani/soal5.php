<?php;
    $jam;
    $menit;
    $detik;
    $total;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 5</title>
</head>
<body>
  <h2> Menghitung Total Detik</h2>  

  <form method="post" action="#">
    <table>
        <tr>
            <td>Jam</td>
            <td> : </td>
            <td><input type="text" name="jam"></td>
        </tr>
        <tr>
            <td>Menit</td>
            <td> : </td>
            <td><input type="text" name="menit"></td>
        </tr>
        <tr>
            <td>Detik</td>
            <td> : </td>
            <td><input type="text" name="detik"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="Total" id="">
            </td>
        </tr>
    </table>
  </form>

    <?php
    if (isset($_POST['submit'])) {
        $jam = $_POST['jam'];
        $menit = $_POST['menit'];
        $detik = $_POST['detik'];
        $total;

        $jam = $jam * 3600;
        $menit = $menit * 60;
        $total = $jam + $menit + $detik;

        echo "Total Detik adalah $total";
    }
    ?>

</body>
</html>
