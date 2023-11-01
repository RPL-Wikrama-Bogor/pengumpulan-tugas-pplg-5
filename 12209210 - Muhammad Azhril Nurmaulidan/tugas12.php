<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nomor 12</title>
  <link rel="stylesheet" href="style.css">
</head>
<center>
<body>
  <class="form">
    <form action="" method="post">
      <label for="hh">HH (Jam) :</label>
      <input type="number" name="hh" id="hh">
      <br><br><br>
      <label for="mm">MM (Menit) :</label>
      <input type="number" name="mm" id="mm">
      <br><br><br>
      <label for="ss">SS (Detik) :</label>
      <input type="number" name="ss" id="ss"><br><br>
      <button name="submit" type="submit" id="submit">Submit</button>
    </form>

<div class="echo">
  <?php
  if (isset($_POST['submit'])) {
    $hh = $_POST['hh'];
    $mm = $_POST['mm'];
    $ss = $_POST['ss'];

    $ss = $ss + 1;

    if ($ss >= 60) {
      $mm = $mm + 1;
      $ss = 00;
    }
    if ($mm >= 60) {
      $hh = $hh + 1;
      $mm = 00;
      $ss = 00;
    }
    if ($hh >= 24) {
      $hh = 00;
      $mm = 00;
      $ss = 00;
    }
    echo $hh . " : " . $mm . " : " . $ss;
  }
  ?>
</div>
</center>
</body>
</html>