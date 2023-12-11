<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="jam">Jam:</label><br>
            <input type="number" id="jam" name="jam" required autofocus><br><br>
            
            <label for="menit">Menit:</label><br>
            <input type="number" id="menit" name="menit" required><br><br>
    
            <label for="detik">Detik:</label><br>
            <input type="number" id="detik" name="detik" required><br><br>
            
            <button name="submit">Submit</button> <br>
    
        </form>
    <?php
    if(isset($_POST['submit'])){
    
        $j = $_POST['jam'];
        $m = $_POST['menit'];
        $d = $_POST['detik'];
        
        
        $j = $j *3600;
        $m = $m *60;
        echo "<p><br>" . $j + $m + $d . "  detik</p>";
        
        
        
        }
        
    ?>
    
</body>
</html>