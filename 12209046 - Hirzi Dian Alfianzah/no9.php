<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>9</title>

  <!-- Tambahkan pautan ke Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h1 class="text-center">Konversi Suhu Fahrenheit ke Celcius</h1>
    <form method="POST" action="">
      <div class="form-group">
        <label for="suhu_fahrenheit">Input Suhu Fahrenheit</label>
        <input type="number" class="form-control" name="suhu_fahrenheit" required>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
      $suhu_fahrenheit = $_POST['suhu_fahrenheit'];

      $suhu_celcius = ($suhu_fahrenheit - 32) * (5/9);

      echo "<h3 class='mt-4'>Hasil Konversi</h3>";
      echo "Suhu Fahrenheit: " . $suhu_fahrenheit . " °F<br>";
      echo "Suhu Celcius: " . $suhu_celcius . " °C<br>";

      if ($suhu_celcius > 30) {
        echo "Suhu Panas" . "<br>";
      } elseif ($suhu_celcius > 20) {
        echo "Suhu Dingin" . "<br>";
      } else {
        echo "Suhu Normal" . "<br>";
      }
    }
    ?>

    <div class="text-center mt-4">
      <a class="btn btn-primary" href="no10.php">Lanjut</a>
      <br><br>
      <a class="btn btn-secondary" href="no8.php">Kembali</a>
    </div>
  </div>

  <!-- Tambahkan pautan ke Bootstrap JS dan jQuery di sini (opsional) -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>

</html>
