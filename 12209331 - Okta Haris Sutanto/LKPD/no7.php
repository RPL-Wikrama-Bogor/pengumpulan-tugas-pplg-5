<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <label for="total_gram">Gram:</label><br>
            <input type="number" id="total_gram" name="total_gram" required autofocus><br><br>
            
            <button name="submit">Submit</button> <br>
    
        </form>


    
<?php
// Input berat buah jeruk dalam gram
if( isset($_POST["submit"])){

    // ini buat manggil inputan diatas
    $berat = $_POST['total_gram'];
// sebelum diskon (dalam rupiah)
$per100Gram = 500;
$sebelumDiskon = ($berat / 100) * $per100Gram;

// Hitung diskon (5% dari total harga sebelum diskon)
$diskon = 0.05 * $sebelumDiskon;

// setelah diskon
$setelahDiskon = $sebelumDiskon - $diskon;

// Tampilkan hasil
echo "Total harga sebelum diskon: " . $sebelumDiskon . " rupiah<br>";
echo "Diskon: " . $diskon . " rupiah<br>";
echo "Total harga setelah diskon: " . $setelahDiskon . " rupiah";

}
?>
</body>
</html>
