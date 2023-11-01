<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Tiket</h1>
  <form action="" method="post">

    <label for="vip">VIP Tiket : </label>
    <input type="number" name="vip" id="vip" required><br>

    <label for="eksekutif">Eksekutif : </label>
    <input type="number" name="eksekutif" id="eksekutif" required><br>

    <label for="ekonomi">ekonomi Tickets Sold:</label>
    <input type="number" name="ekonomi" id="ekonomi" required><br>

    <button name="submit" id="submit">Kirim</button>
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $kategori_vip = $_POST['vip'];
    $kategori_eksekutif = $_POST['eksekutif'];
    $kategori_ekonomi = $_POST['ekonomi'];

    $keuntungan_vip = "";
    $keuntungan_eksekutif = "";
    $keuntungan_ekonomi = "";

    if ($kategori_vip >= 35) {
      $keuntungan_vip = "25%";
    } elseif ($kategori_vip >= 20 && $kategori_vip < 35) {
      $keuntungan_vip = "15%";
    } else {
      $keuntungan_vip = "5%";
    }

    if ($kategori_eksekutif >= 45) {
      $keuntungan_eksekutif = "20%";
    } elseif ($kategori_eksekutif >= 20 && $kategori_eksekutif < 45) {
      $keuntungan_eksekutif = "10%";
    } else {
      $keuntungan_eksekutif = "2%";
    }

    $keuntungan_ekonomi = "7%";

    echo "VIP Keuntungan: " . $keuntungan_vip . "<br>";
    echo "Eksekutif Keuntungan: " . $keuntungan_eksekutif . "<br>";
    echo "Ekonomi Keuntungan: " . $keuntungan_ekonomi . "<br>";
  }
  ?>
</body>

</html>