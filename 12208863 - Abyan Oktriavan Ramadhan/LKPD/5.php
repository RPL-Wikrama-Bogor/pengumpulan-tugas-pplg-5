

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LKPD 5</title>
</head>
<body>
    <h1>Konversi jam ke detik</h1>
    <form action="" method="post">
        <label for="">Jam</label>
        <input type="number" name="jam" id="jam">
        <br>
        <label for="">Menit</label>
        <input type="number" name="menit" id="menit">
        <br>
        <label for="">Detik</label>
        <input type="number" name="detik" id="detik">
        <br>
        <input type="submit" name="submit";> 
    </form>
    <?php
    if(isset($_POST['submit'])){
        $jam = $_POST['jam'];
        $menit = $_POST['menit'];
        $detik = $_POST['detik'];
        $jam = $jam * 3600;
        $menit = $menit * 60;
        $total = $jam + $menit + $detik;

        echo "total: $total detik";
    } 
    ?>

</body>
</html>
