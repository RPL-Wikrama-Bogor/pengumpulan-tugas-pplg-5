<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Harga Diskon</title>
</head>
<center><h3>input total gram</h3></center>
<body>

  <form method="post" action="#">
    <tr>
      <td><label for="jam">Input total gram</label></td>
      <td><input type="number" name="total_gram" id="total_gram" maxlength="2"></td>
    </tr>
    <tr>
      <td><input type="submit" name="submit" value="Konversi"></td>
    </tr>
  </form>

  <?php
    if (isset($_POST['submit'])) {
      $total_gram = $_POST['total_gram'];
      $harga_sebelum = $total_gram * 500;
      $diskon = 5 * $harga_sebelum / 100;
      $harga_setelah = $harga_sebelum - $diskon;
      echo "Total gram = $total_gram<br>";
      echo "Harga sebelum diskon = $harga_sebelum<br>";
      echo "Diskon = $diskon<br>";
      echo "Harga setelah diskon = $harga_setelah<br>";
    }
  ?>
</body>
</html>