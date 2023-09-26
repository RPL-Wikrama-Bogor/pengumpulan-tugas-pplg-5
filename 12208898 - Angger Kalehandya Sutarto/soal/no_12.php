<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menambahkan Waktu Satu Detik</title>
  <style>
    body {
      background-color: #333;
      color: white;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      display: flex;
      justify-content: space-between;
      width: 50%;
      background-color: #444;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      margin-left: 100px;
    }

    .form-left {
      flex: 1;
      padding-right: 20px;
    }

    .form-left label,
    .form-left input {
      display: block;
      margin-bottom: 10px;
    }

    .form-left .number {
      width: 100%;
      padding: 5px;
      border: none;
      background-color: #555;
      color: white;
    }

    .form-left button {
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
    }

    .form-left button:hover {
      background-color: #0056b3;
    }

    .container-right {
      flex: 1;
      padding-left: 20px;
      border-left: 1px solid #555;
    }

    .container-right p {
      color: white;
      font-size: 18px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="form-left">
      <form action="" method="post">
        <label for="hh">Input HH (Jam) :</label>
        <input type="number" name="hh" id="hh" class="number" required>
        <br>
        <label for="mm">Input MM (Menit) :</label>
        <input type="number" name="mm" id="mm" class="number" required>
        <br>
        <label for="ss">Input SS (Detik) :</label>
        <input type="number" name="ss" id="ss" class="number" required>
        <button name="submit" id="submit">Kirim</button>
      </form>
    </div>
  </div>
  <div class="container-right">
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
      echo '<p> Hasil Konversi +1 : <br>';
      echo '<p>' . $hh . ' Jam' . " : " . $mm . ' Menit' . " : " . $ss . ' Detik </p>';
    }
    ?>
  </div>

</body>

</html>