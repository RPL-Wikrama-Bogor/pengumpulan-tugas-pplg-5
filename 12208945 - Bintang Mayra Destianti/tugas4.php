<?php
$tunj;
$pjk;
$gaji_bersih;
$gaji_pokok;
$nama;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gaji Karyawan</title>
</head>

<body>
<center><h2> tabel gaji karyawan</h2></center>
  <center>
<form method="post" action="#">
    <table>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><input type="text" name="nama"></td>
      </tr>
      <tr>
        <td>Gaji Pokok</td>
        <td>:</td>
        <td><input type="number" name="gajipokok"></td>
      </tr>
      <tr>
        <td>
          <input type="submit" name="submit" value="Cari">
</center>
        </td>
      </tr>
  </form>

  <?php
  if (isset($_POST['submit'])) {
    //process memasukkan hasil input variable
    $nama = $_POST['nama'];
    $gaji_pokok = $_POST['gajipokok'];
    //process perhitungan
    $gaji_bersih;
    $tunj;
    $pjk;    
    $tunj = (20 * $gaji_pokok)/100;
    $pjk = (15 * ($gaji_pokok + $tunj ) /100);
    $gaji_bersih = $gaji_pokok + $tunj - $pjk;
    //output
    echo "Nama: $nama<br>"; 
    echo "Tunjangan: $tunj<br>";
    echo "Pajak: $pjk<br>";
    echo "Gaji Bersih: $gaji_bersih<br>";
    
  }
?>
</body>
</html>

