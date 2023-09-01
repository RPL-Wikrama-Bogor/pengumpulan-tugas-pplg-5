<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }

  h1 {
    text-align: center;
    padding: 20px;
  }

  .form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }

  label {
    display: block;
    margin-bottom: 8px;
  }

  input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #3498db;
    border: none;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
  }

  .result {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }
</style>

<body>
  <div class="form">
    <h1>Tiket</h1>
    <form action="" method="post">

      <label for="vip">VIP Tiket : </label>
      <input type="number" name="vip" id="vip" required min="0" max="100"><br>

      <label for="eksekutif">Eksekutif Tiket : </label>
      <input type="number" name="eksekutif" id="eksekutif" required min="0" max="100"><br>

      <label for="ekonomi">Ekonomi Tiket :</label>
      <input type="number" name="ekonomi" id="ekonomi" required min="0" max="100"><br>

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
      echo "<br>";
      echo $keuntungan_vip . " Keuntungan Vip" . "<br>";
      echo $keuntungan_eksekutif . " Keuntungan Eksekutif" . "<br>";
      echo $keuntungan_ekonomi . " Keuntungan Ekonomi" . "<br>";
    }
    ?>
  </div>
</body>

</html>