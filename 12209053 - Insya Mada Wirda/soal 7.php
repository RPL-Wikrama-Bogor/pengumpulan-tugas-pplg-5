<?php
    $total_gram = $_GET['total_gram'] ?? 0;

    $harga_sebelum = 0;
    $diskon = 0;
    $harga_setelah = 0;

    if (is_numeric($total_gram)) {
        $harga_sebelum = 500 * $total_gram;
        $diskon = 5 * $harga_sebelum / 100;
        $harga_setelah = $harga_sebelum - $diskon;
    }
?>
 
<form action="" method="GET">
    <label for="total_gram">Total Gram</label>
    <br>
    <input type="number" name="total_gram" id="total_gram" required="required" value="<?php echo $_GET['total_gram'] ?? 0; ?>" />
    <br><br>

    <input type="submit" value="SUBMIT" />
    
    <p>Harga Sebeblum : <?php echo $harga_sebelum ?></p>
    <p>Diskon : <?php echo $diskon ?></p>
    <p>Harga Setelah : <?php echo $harga_setelah ?></p>
</form>