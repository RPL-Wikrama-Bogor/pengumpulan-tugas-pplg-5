<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ratusan Puluhan Satuan</title>
</head>
<body>
  
  <form method="POST" action="#">
    <tr>
      <td>Input Bilangan</td>
      <td><input type="number" value="Masukkan Bilangan" name="bilangan"></td>
    </tr>
    <tr>
      <td><input type="submit" value="Hitung" name="submit"></td>
    </tr>
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $bilangan = $_POST['bilangan'];
    $satuan = $bilangan % 10;
    $puluhan = ($bilangan / 10 ) % 10;
    $ratusan = $bilangan / 100;
    echo "Ratusan = $ratusan<br>";
    echo "Puluhan = $puluhan<br>";
    echo "Satuan = $satuan<br>";
  }
  ?>

</body>
</html>   