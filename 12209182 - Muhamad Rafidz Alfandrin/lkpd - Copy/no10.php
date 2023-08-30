<!DOCTYPE html>
<html>
<head>
    <title>Input pelajaran</title>
</head>
<body>
    <h1>Input pelajaran</h1>
    <form action="" method="post">
        <label for="Matematika">Matematika:</label>
        <input type="text" name="Matematika" required><br>
        <br>
        <label for="PABP">PABP:</label>
        <input type="text" name="PABP" required><br>
        <br>
        <label for="DPK">DPK:</label>
        <input type="text" name="DPK" required><br>
        <br>
        <input type="submit" value="Input">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $matematika = $_POST["Matematika"];
    $pabp = $_POST["PABP"];
    $dpk = $_POST["DPK"];

    $rata = ($matematika + $pabp + $dpk) / 3;

    if ($rata>=80 && $rata<100){
        echo " GRADE: (A)";
    }
    elseif ($rata>=75 && $rata<80){
        echo " GRADE: (B)";
    }
    elseif ($rata>=65 && $rata<75){
        echo " GRADE: (C)";
    }
    elseif ($rata>=45 && $rata<65){
        echo " GRADE: (D)";
    }
    elseif ($rata>=0 && $rata<45){
        echo " GRADE: (E)";
    }else{
        echo " GRADE: (K)";
    } 
}
?>
