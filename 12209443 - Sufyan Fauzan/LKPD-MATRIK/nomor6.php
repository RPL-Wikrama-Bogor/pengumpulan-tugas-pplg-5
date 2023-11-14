<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Waktu</title>
</head>

<body>
  <h1>Konversi Detik ke Jam</h1>
  <form method="POST" action="">
    <label for="waktu">Input Waktu (detik)</label>
    <input type="number" name="waktu" id="waktu"><br>
    <button type="submit" name="submit">Konversi</button>
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $waktu = $_POST['waktu'];
    $hasil = 0;

    if ($waktu >= 3600) {
      $jam = floor($waktu / 3600);
      $waktu = $waktu - ($jam * 3600);
      $hasil .= $jam . " jam ";
    }
    if ($waktu >= 60) {
      $menit = floor($waktu / 60);
      $waktu = $waktu - ($menit * 60);
      $hasil .= $menit . " menit ";
    }
    if ($waktu > 0) {
      $detik = $waktu;
      $hasil .= $detik . " detik";
    }

    echo "<p>Hasil konversi: " . $hasil . "</p>";
  }
  ?>
</body>

</html>