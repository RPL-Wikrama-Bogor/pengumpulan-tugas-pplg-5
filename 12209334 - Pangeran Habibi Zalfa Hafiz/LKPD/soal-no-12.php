<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menambahkan Waktu Satu Detik</title>
</head>

<body>
  <div class="form">
    <form action="" method="post">
      <label for="hh">Input HH (Jam) :</label>
      <input type="number" name="hh" id="hh">
      <br>
      <label for="mm">Input MM (Menit) :</label>
      <input type="number" name="mm" id="mm">
      <br>
      <label for="ss">Input SS  (Detik) :</label>
      <input type="number" name="ss" id="ss">
      <button name="submit" id="submit">Kirim</button>
    </form>
    <br>
        <a href="soal-no-11.php">Soal Sebelumnya</a>
        <br>
        <a href="soal-no-13.php">Soal Berikutnya</a>
</body>

</html>
<div class="echo">
  <?php
  if (isset($_POST['submit'])) {
    $hh = $_POST['hh'];
    $mm = $_POST['mm'];
    $ss = $_POST['ss'];

    $ss = $ss + 1;

    if ($ss > 60) {
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
</div>