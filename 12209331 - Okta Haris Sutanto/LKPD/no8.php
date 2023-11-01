<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<label for="inputbil">Input bilangan:</label><br>
<input type="number" id="inputbil" name="inputbil" required autofocus><br><br>

<button name="submit">Submit</button> <br>

</form>

<?php
if (isset($_POST["submit"])) {
    $bil = $_POST['inputbil'];

    $length = strlen($bil);
    $satuan = (int) $bil[$length - 1]; // Angka satuan

    // pake 0 tuh buat kalo si angkanya di bawah 1 kalo gitu hasilnya 0
    $puluhan = $length > 1 ? (int) $bil[$length - 2] : 0; // Angka puluhan
    $ratusan = $length > 2 ? (int) $bil[$length - 3] : 0; // Angka ratusan

    echo "Bilangan: " . $bil . "<br>";
    echo "Angka satuan: " . $satuan . "<br>";
    echo "Angka puluhan: " . $puluhan . "<br>";
    echo "Angka ratusan: " . $ratusan . "<br>";

}
?>

    
</body>
</html>