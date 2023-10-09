<!DOCTYPE html>
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
</html>

<?php


if(isset($_POST['submit'])){
    
    $totalDetik = $_POST['totaldetik'];
   
    
   



$jumlahJam = floor($totalDetik / 3600);
$sisaDetik = $totalDetik % 3600;
$jumlahMenit = floor($sisaDetik / 60);
$sisaDetik = $sisaDetik % 60;

echo "Hasil konversi: $jumlahJam jam $jumlahMenit menit $sisaDetik detik\n";

    
    
    
    }
    
    
    
    
    
    
    
    
    ?>
    
