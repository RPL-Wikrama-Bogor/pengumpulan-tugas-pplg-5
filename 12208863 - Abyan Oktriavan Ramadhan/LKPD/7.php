<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LKPD 7</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Total Gram</label>
        <input type="text" name="totalGram" id="totalGram">
        <input type="submit" name="submit">
    </form>

    <?php 
    if(isset($_POST['submit'])){
        $total_gram = $_POST['totalGram'];
        
        $harga_sebelum = 500 * $total_gram;
        $diskon = 5 * $harga_sebelum / 100;
        $harga_setelah = $harga_sebelum - $diskon;
        
        echo "harga sebelum Rp." . number_format($harga_sebelum, '1', ',', '.') . "<br>" .
        " mendapatkan diskon sebesar Rp." . number_format($diskon, '1', ',', '.') . "<br>" . 
        " jumlah yang harus dibayar Rp." . number_format($harga_setelah, '1', ',', '.');

    }
    ?>
    
</body>
</html>