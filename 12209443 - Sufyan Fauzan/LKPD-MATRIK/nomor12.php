<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menambahkan Waktu Satu Detik</title>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap');

  body {
    font-family: 'Patrick Hand', cursive;
    text-align: center;
    margin: 0;
    padding: 0;
    background: rgb(255,251,251);
background: linear-gradient(90deg, rgba(255,251,251,1) 23%, rgba(205,210,212,1) 49%, rgba(176,173,173,1) 100%);
  }

  .form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background: rgb(231,222,222);
background: linear-gradient(90deg, rgba(231,222,222,1) 0%, rgba(205,210,212,1) 49%, rgba(255,251,251,1) 77%);
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }

  .form label,
  .form input {
    display: inline-block;
    margin-bottom: 10px;
   text-align: center;
  }

  .hasil {
    margin-top: 20px;
    padding: 10px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 4px;
  }

  button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
</style>

<body>
  <br><br><br>
  <div class="form">
    <h1>Mari input waktu</h1>
    <form action="" method="post">
      <label for="hh">Input HH (Jam) :</label>
      <input type="number" name="hh" id="hh">
      <br>
      <label for="mm">Input MM (Menit) :</label>
      <input type="number" name="mm" id="mm">
      <br>
      <label for="ss">Input SS (Detik) :</label>
      <input type="number" name="ss" id="ss">
      <br>
      <button name="submit" id="submit">Kirim</button>
    </form>
</body>

</html>
<div class="hasil">
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
    echo "Setelah 1 detik : " . $hh . " Jam : " . $mm . " Menit : " . $ss . " Detik";
  }
  ?>
</div>
</div>