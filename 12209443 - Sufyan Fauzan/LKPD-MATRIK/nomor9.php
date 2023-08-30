<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Suhu</title>
</head>

<body>
  <h1>Suhu Fahrel</h1>
  <form method="POST" action="">
    <label for="">Input suhu fahrenheit</label>
    <input type="number" name="suhu_fahrenheit"><br>
    <button type="submit" name="submit">Submit</button>
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $suhu_fahrenheit = $_POST['suhu_fahrenheit'];

    $suhu_celcius = ($suhu_fahrenheit - 32) * (5/9);

    if ($suhu_celcius > 300) {
      echo "suhu panas";
    } elseif ($suhu_celcius > 250) {
      echo "suhu dingin";
    } else {
      echo "suhu normal";
    }
  }


  ?>

</body>

</html>