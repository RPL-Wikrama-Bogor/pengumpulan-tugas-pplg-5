<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kode Pegawai</title>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap');

  body {
    font-family: 'Patrick Hand', cursive;
    text-align: center;
    margin: 0;
    padding: 0;
    background: rgb(255, 251, 251);
    background: linear-gradient(90deg, rgba(255, 251, 251, 1) 23%, rgba(205, 210, 212, 1) 49%, rgba(176, 173, 173, 1) 100%);
  }

  .container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background: rgb(203,195,195);
background: linear-gradient(90deg, rgba(203,195,195,1) 0%, rgba(205,210,212,1) 49%, rgba(255,251,251,1) 77%);
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }

  form {
    margin-top: 20px;
  }

  label {
    display: block;
    margin-bottom: 8px;
  }

  input {
    width: 95%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 8px;
  }

  button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  button:hover {
    background-color: #0056b3;
  }

  .hasil {
    margin-top: 20px;
    padding: 10px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 4px;
  }
</style>

<body>
  <br><br><br>
  <div class="container">
    <h1>Kode Pegawai</h1>
    <form method="POST" action="">
      <label for="no_pegawai">Input No Pegawai : </label>
      <input type="text" id="no_pegawai" name="no_pegawai" maxlength="11">
      <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
      $no_pegawai = $_POST['no_pegawai'];

      if (strlen($no_pegawai) < 11 || strlen($no_pegawai) > 11) {
        echo "Nomor pegawai tidak valid. Harus memiliki 11 karakter.";
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
          $tanggal_lahir = "$tanggal - $bulan - $tahun";

          echo '<div class="hasil"> <p>No Golongan : ' . $no_golongan . '<br> Tanggal Lahir : ' . $tanggal_lahir . ' <br> Urutan : ' . $no_urutan . '</p></div>';
        }
      }
    }

    ?>
  </div>
</body>

</html>