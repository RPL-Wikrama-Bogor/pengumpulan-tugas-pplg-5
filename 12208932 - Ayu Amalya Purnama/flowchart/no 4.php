<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Gaji bersih</h1>
  <form method="POST" action="">
    <label for="">Input Nama : </label>
    <input type="text" name="nama"><br>
    <label for="">Input gaji pokok : </label>
    <input type="number" name="gaji_pokok"><br> 
      <button type="submit" name="submit">Submit</button>
  </form>
  <?php
  if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $gaji_pokok = $_POST['gaji_pokok'];

    $tunjangan = ((20 * $gaji_pokok) / 100);
    $pajak = (15 * ($gaji_pokok + $tunjangan) / 100);
    $gaji_bersih = $gaji_pokok + $tunjangan - $pajak;

    echo $nama . " Menerima tunjangan sebesar Rp. " .$tunjangan ." dengan pajak sebesar Rp. ". $pajak ." dan menerima gaji bersih sebesar Rp. ". $gaji_bersih;
  }

  ?>
</body>

</html>