<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Waktu</title>
</head>

<body>
  <h1>Konversi Waktu ke Detik</h1>
  <form method="POST" action="">
    <label for="">Input Jam</label>
    <input type="number" name="jam"><br>
    <label for="">Input Menit</label>
    <input type="number" name="menit"><br>
    <label for="">Input Detik</label>
    <input type="number" name="detik"><br>
    <button type="submit" name="submit">Submit</button>
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $jam = $_POST['jam'];
    $menit = $_POST['menit'];
    $detik = $_POST['detik'];

    $jam = $jam * 3600;
    $menit = $menit * 60;

    $total = $jam + $menit + $detik;

    echo $total;
  }
  ?>

</body>

</html>