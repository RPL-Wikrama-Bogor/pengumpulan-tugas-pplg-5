<?php

$suhu_fahrenheit;
$suhu_celcius;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Suhu</title>
</head>
<body>
  <form method="post" action="#">
    <tr>
      <label for="suhu_f">Input Suhu</label>
      <input type="text" name="suhu_f" id="suhu_f">
      <input type="submit" value="Submit" name="submit">
    </tr>
  </form>

  <?php

  if (isset($_POST['submit'])) {
    $suhu_f = $_POST['suhu_f'];


    $suhu_c = ($suhu_f - 32) * 5 / 9 ;

    if($suhu_c > 30){
      echo "panas";
    }
    elseif($suhu_c < 25){
      echo "dingin";
    }
    else{
      echo "normal";
    }
  }

  ?>
</body>
</html>