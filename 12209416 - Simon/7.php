<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>NO 7</h1>

<body>
    <form action="#" method="post">
        <label for="total_gram">
            <input type="number" name="total_gram"><br><br>
            <button name="submit">Submit</button> <br>

    </form>
</body>

</html>

<?php

if(isset($_POST['submit'])){
    
$total_gram = $_POST    ['total_gram'] ;

$harga_sebelum = 500 * $total_gram ;
$diskon = 5 * $harga_sebelum /100 ;
$harga_setelah = $harga_sebelum - $diskon;

echo "<br>";
echo "harga sebelum = ",$harga_sebelum ; 
echo "<br>";
echo "diskon = ",$diskon ; 
echo "<br>";
echo "harga setelah = " ,$harga_sebelum;





}
?>
