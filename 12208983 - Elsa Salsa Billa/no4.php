<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaji Karyawan</title>
</head>
<body>
    <h1>Gaji Karyawan</h1>
    <form action="" method="post">
        <label for="nama">Nama</label> <br>
        <input type="text" name="nama" id="" > <br><br>
        <label for="gp">Gaji Pokok</label> <br>
        <input type="number" name="gp" id="" > <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php
if ($_SERVER ['REQUEST_METHOD'] == "POST") {
    $nama = $_POST['nama'] ;
    $gp = $_POST['gp'] ;

    $tunj = (20/100) * $gp ;
    $pjk = (15/100)  * ($gp + $tunj) ;
    $gb = $gp + $tunj - $pjk ;

    echo "<br> Nama karyawan : " . $nama ."<br>";
    echo "Gaji bersih : " . $gb . " Juta";
}
?>  

