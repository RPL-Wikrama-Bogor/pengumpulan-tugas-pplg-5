<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sepuluh</title>
</head>
<body><center>
<h2>NO 10</h2>
    <form action="" method="post">
        <input type="number" name="pabp" placeholder="Masukan nilai pabp"><br></br>
        <input type="number" name="mtk" placeholder="Masukan nilai mtk"><br></br>
        <input type="number" name="dpk" placeholder="Masukan nilai dpk"><br></br>
        <button name="submit">PENCET</button><br></br>

</body>
</from>
</html>

<?php
if(isset($_POST['submit'])){

    $pabp = $_POST['pabp'];
    $mtk = $_POST['mtk'];
    $dpk = $_POST['dpk'];

    $rata_rata = ($pabp + $mtk + $dpk )/3;

    if ($rata_rata <=100 && $rata_rata >= 80) {
        echo "A";
    }elseif ($rata_rata <=80 && $rata_rata >= 75) {
        echo"B";
    }elseif ($rata_rata <=75 && $rata_rata >= 65) {
        echo"C";
    }elseif ($rata_rata <=45 && $rata_rata >= 0) {
        echo "E";
    }else {
        echo"angka tidak memenuhi syarat";
    }
}
?>
</center> 