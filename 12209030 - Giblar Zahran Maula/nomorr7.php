<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Harga </title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<body><center>
    <div class="card" style="width:23rem;padding:4rem;top:5rem;">
    <h1>Kalkulator Harga Jeruk</h1>
    <form method="post" action="">
        <label for="berat_jeruk">Berat Jeruk (gram):</label>
        <input type="number" name="berat_jeruk" required class="form-control"><br><br>
       <button type="submit" name="hitung" value="Hitung Harga" class="btn btn-dark"style="width:100%;">hitung</button>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
     
        $berat_jeruk = $_POST['berat_jeruk'];

      
        $harga_per_100_gram = 500;

     
        $total_harga_sebelum_diskon = ($berat_jeruk / 100) * $harga_per_100_gram;

       
        $diskon = 0.05 * $total_harga_sebelum_diskon;

       
        $total_harga_setelah_diskon = $total_harga_sebelum_diskon - $diskon;

        echo "<h2>Hasil Perhitungan</h2>";
        echo "Berat Jeruk (gram): $berat_jeruk gram<br>";
        echo "Total Harga Sebelum Diskon: Rp " . number_format($total_harga_sebelum_diskon, 2) . "<br>";
        echo "Diskon (5%): Rp " . number_format($diskon, 2) . "<br>";
        echo "Total Harga Setelah Diskon: Rp " . number_format($total_harga_setelah_diskon, 2) . "<br>";
    }
    ?>
</div></center>
</body>
</html>
