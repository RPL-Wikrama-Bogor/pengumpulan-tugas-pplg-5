<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No 8</title>
</head>
<body>
    <h2> Input Bilangan</h2>
    <form action="" method="post">
        <label for="bilangan">Input Bilangan: </label>
        <input type="number" name="bilangan" id="bilangan">
        <input type="submit" name="submit">
    </form>

    <?php 
    if(isset($_POST['submit'])){
    $bilangan = $_POST['bilangan'];
    $ratusan = 0;

    $satuan = $bilangan % 10;
    $puluhan = ($bilangan / 10) % 10;

    if( $bilangan >=100 ) {
    $ratusan = floor($bilangan / 100) %10;
    }

    echo '<p> Hasil Satuan: ' . $ratusan . ' Ratusan, ' . 
    $puluhan . ' Puluhan, ' . $satuan . ' Satuan,' . '</p>';
}
    ?>
</body>
</html>