<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sembilan</title>
</head>
<body><center>
    <h2>NO 9</h2>
    <form action="" method="post">
        <input type="number" name="suhu" placeholder="masukan suhu"><br></br>
        <button name="submit">PENCET</button><br></br>
</body>
</form>
</html>
<?php
if (isset($_POST['submit'])){

    $suhu= $_POST['suhu'];

    // $suhu_celcius = $suhu/33.8;

    if ($suhu > 300) {
        echo "panas";

    }elseif ($suhu > 250 ) {
        echo "dingin";
    }else 
    echo "normal";
}


?>
</center>