<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Menentukan Grade</title>
</head>
<body> 
    
<center>
    <h1>Menentukan Grade</h1>
        
        <form action="" method="post">
        <label for="nama">Nama</label> <br>
        <input type="text" name="nama" id="" > <br>
        <label for="pabp">PABP</label> <br>
        <input type="number" name="pabp" id="" > <br>
        <label for="mtk">Matematika</label> <br>
        <input type="number" name="mtk" id="" > <br>
        <label for="prod">Produktif</label> <br>
        <input type="number" name="prod" id="" > <br>
        
        <input type="submit" value="Submit">
    </form>
    </form>
</div>
</div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $pabp = $_POST["pabp"];
    $mtk = $_POST["mtk"];
    $prod = $_POST["prod"];
    
    $rata = ($pabp + $mtk + $prod) / 3;

    if ($rata>=80 && $rata<=100) {
        echo "Jumlah = $rata (A)";
    } else if ($rata>=75 && $rata<=80) {
        echo "Jumlah = $rata (B)";
    } else if ($rata>=65 && $rata<=75) {
        echo "Jumlah = $rata (C)";
    }
    else if ($rata>=45 && $rata<=65) {
        echo "Jumlah = $rata (D)";
    }
    else if ($rata>=0 && $rata<=45) {
        echo "Jumlah = $rata (E)";
    } else {
        echo "Angka Tidak Memenuhi Persyaratan";
    }
}
?>