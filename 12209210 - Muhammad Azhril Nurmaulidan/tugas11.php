<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style11.css">
</head>

<body><center>
  <form method="POST" action="">
    <label for="">Input no pegawai</label>
    <input type="text" name="no_pegawai"><br>
    <button type="submit" name="submit">Submit</button>
  </form>

  <div class="echo">
  <?php
  if (isset($_POST['submit'])) {
    $no_pegawai = $_POST['no_pegawai'];

    if (strlen($no_pegawai) < 11 || strlen($no_pegawai) > 11) {
      echo "no pegawai tidak sesuai";
    } else {
      $no_golongan = substr($no_pegawai, 0, 1);
      $tanggal = substr($no_pegawai, 1, 2);
      $bulan = substr($no_pegawai, 3, 2);
      $tahun = substr($no_pegawai, 5, 4);
      $no_urutan = substr($no_pegawai, 9, 2);


      if ($bulan == "01") {
        $bulan = "Januari";
      } else if ($bulan == "02") {
        $bulan = "Februari";
      } else if ($bulan == "03") {
        $bulan = "Maret";
      } else if ($bulan == "04") {
        $bulan = "April";
      } else if ($bulan == "05") {
        $bulan = "Mei";
      } else if ($bulan == "06") {
        $bulan = "Juni";
      } else if ($bulan == "07") {
        $bulan = "Juli";
      } else if ($bulan == "08") {
        $bulan = "Agustus";
      } else if ($bulan == "09") {
        $bulan = "September";
      } else if ($bulan == "10") {
        $bulan = "Oktober";
      } else if ($bulan == "11") {
        $bulan = "November";
      } else if ($bulan == "12") {
        $bulan = "Desember";
      } else {
        $bulan = "error";
      }

      if ($bulan == "error") {
        echo "no pegawai tidak sesuai";
      } else {
        $tanggal_lahir = $tanggal . $bulan . $tahun;

        echo "no golongan :" . $no_golongan . "<br> tanggal lahir :" . $tanggal_lahir . "<br>" . "dengan urutan :" . $no_urutan;
      }
    }
  }


  ?>
</div>
</center>
</body>

</html>