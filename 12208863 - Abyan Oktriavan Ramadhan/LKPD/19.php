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

  <label for="tiket">Jumlah Tiket : </label>
    <input type="number" name="tiket" id="tiket" required><br>

    <label for="">Kategori Tiket : </label>
    <select name="kategori_tiket" id="kategori_tiket" required="" autocomplete="off">
      <option value="">Pilih Metode</option>
      <option value="vip">VIP</option>
      <option value="eksekutif">Eksekutif</option>
      <option value="ekonomi">Ekonomi</option>
    </select>
 

    <button name="submit" id="submit">Kirim</button>
  </form>

  <?php
if (isset($_POST['submit'])) {
    $jumlah_tiket = $_POST['tiket'];
    $kategori_tiket = $_POST['kategori_tiket'];

    $keuntungan = "";

    if ($kategori_tiket === "vip") {
        if ($jumlah_tiket >= 35) {
            $keuntungan = "25%";
        } elseif ($jumlah_tiket >= 20 && $jumlah_tiket < 35) {
            $keuntungan = "15%";
        } else {
            $keuntungan = "5%";
        }
    } elseif ($kategori_tiket === "eksekutif") {
        if ($jumlah_tiket >= 45) {
            $keuntungan = "20%";
        } elseif ($jumlah_tiket >= 20 && $jumlah_tiket < 45) {
            $keuntungan = "10%";
        } else {
            $keuntungan = "2%";
        }
    } elseif ($kategori_tiket === "ekonomi") {
        $keuntungan = "7%";
    } else {
        $keuntungan = "Pilih kategori tiket yang valid";
    }

    echo "Kategori Tiket: " . ucfirst($kategori_tiket) . "<br>";
    echo "Jumlah Tiket: " . $jumlah_tiket . "<br>";
    echo "Keuntungan: " . $keuntungan . "<br>";
}
?>


</body>

</html>