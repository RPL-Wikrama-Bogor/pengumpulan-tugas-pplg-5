<!DOCTYPE html>
<html>
<head>
    <title>Memisahkan Angka</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<body>
    <h1>Memisahkan Angka</h1>
    <form method="post" action="">
        <label for="bilangan">Masukkan Bilangan Bulat:</label>
        <input type="number" name="bilangan" required class="form-control"><br><br>
        <input type="submit" name="pisahkan" value="Pisahkan Angka">
    </form>

    <?php
    if (isset($_POST['pisahkan'])) {
       
        $bilangan = $_POST['bilangan'];

      
        $satuan = $bilangan % 10;
        $puluhan = ($bilangan % 100) / 10;
        $ratusan = ($bilangan % 1000) / 100;
        $ratusan = intval( $ratusan);
        echo $puluhan = intval( $puluhan);
       
        echo "<h2>Hasil Pemisahan Angka</h2>";
        echo "Bilangan: $bilangan<br>";
        echo "Satuan: $satuan<br>";
        echo "Puluhan: $puluhan<br>";
        echo "Ratusan: $ratusan<br>";
    }
    ?>

</body>
</html>
