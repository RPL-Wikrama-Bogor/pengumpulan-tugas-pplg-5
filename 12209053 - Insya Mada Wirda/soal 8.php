<?php
    $bilangan = $_GET['bilangan'] ?? 0;

    $satuan = 0;
    $puluhan = 0;
    $ratusan = 0;

    if (is_numeric($bilangan)) {
        $satuan = $bilangan % 10;
        $puluhan = ($bilangan / 10) % 10;
        $ratusan = $bilangan / 100;
    }
?>
 
<form action="" method="GET">
    <label for="bilangan">Bilangan</label>
    <br>
    <input type="number" name="bilangan" id="bilangan" required="required" value="<?php echo $_GET['bilangan'] ?? 0; ?>" />
    <br><br>

    <input type="submit" value="SUBMIT" />
    
    <p>Satuan : <?php echo $satuan ?></p>
    <p>Puluhan : <?php echo $puluhan ?></p>
    <p>Ratusan : <?php echo $ratusan ?></p>
</form>