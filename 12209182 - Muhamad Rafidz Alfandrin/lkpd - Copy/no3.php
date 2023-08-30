<!DOCTYPE html>
<html>
<head>
    <title>Bilangan bulat</title>
</head>
<body>
    <h1>Input bilangan bulat</h1>
    <form action="" method="post">
        <label for="Nilai A">Nilai A</label>
        <input type="number" name="bilangan_a" required><br>
        <br>
        <label for="Nilai B">Nilai B</label>
        <input type="number" name="bilangan_b" required><br>
        <br>
        <label for="Nilai C">Nilai C</label>
        <input type="number" name="bilangan_c" required><br>
        <br>
        <input type="submit" value="Input">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $a = $_POST["bilangan_a"];
    $b = $_POST["bilangan_b"];
    $c = $_POST["bilangan_c"];


    if($a > $b && $a > $c){
        echo "A";
    }
    elseif($b > $a && $b > $c){
        echo "B";
    }
    elseif($c > $a && $c > $b){
        echo "C";
    }
    else{
        echo "Sama besar";
    }
}
?>