<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>11</title>
    <!-- Tambahkan pautan ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container">
        <h1 class="display-4 text-center mt-5">Cek Pegawai</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="no_pegawai">Nomor Pegawai</label>
                <input type="text" class="form-control" name="no_pegawai" id="no_pegawai" placeholder="Masukkan Nomor Pegawai" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Cek</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
    $no_pegawai = $_POST['no_pegawai'];

    if (strlen($no_pegawai) < 11 || strlen($no_pegawai) > 11) {
      echo "no pegawai tidak valdi";
    } else {
      $no_golongan = substr($no_pegawai, 0, 1);
      $tanggal = substr($no_pegawai, 1, 2);
      $bulan = substr($no_pegawai, 3, 2);
      $tahun = substr($no_pegawai, 5, 4);
      $no_urutan = substr($no_pegawai, 9, 2);


      if ($bulan == "01") {
        $bulan = "Januari";
      } elseif ($bulan == "02") {
        $bulan = "Februari";
      } elseif ($bulan == "03") {
        $bulan = "Maret";
      } elseif ($bulan == "04") {
        $bulan = "April";
      } elseif ($bulan == "05") {
        $bulan = "Mei";
      } elseif ($bulan == "06") {
        $bulan = "Juni";
      } elseif ($bulan == "07") {
        $bulan = "Juli";
      } elseif ($bulan == "08") {
        $bulan = "Agustus";
      } elseif ($bulan == "09") {
        $bulan = "September";
      } elseif ($bulan == "10") {
        $bulan = "Oktober";
      } elseif ($bulan == "11") {
        $bulan = "November";
      } elseif ($bulan == "12") {
        $bulan = "Desember";
      } else {
        $bulan = "error";
      }

      if ($bulan == "error") {
        echo "no pegawai tidak sesuai";
      } else {
        $tanggal_lahir = $tanggal . $bulan . $tahun;

        echo "no golongan" . $no_golongan . "<br> tanggal lahir" . $tanggal_lahir . "<br>" . "dengan urutan" . $no_urutan;
      }
    }
  }


  ?>

    </div>
<div class="text-center mt-4">
        <a class="btn btn-primary" href="no12.php">Lanjut</a>
        <br><br>
        <a class="btn btn-secondary" href="no10.php">Kembali</a>
   </div>
</div>

    <!-- Tambahkan pautan ke Bootstrap JS dan jQuery (opsional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>