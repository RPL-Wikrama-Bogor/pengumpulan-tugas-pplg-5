<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <center>
    <table>
      <form action="" method="post">
        <tr>
          <td>
            <h2>Rental Motor</h2>
          </td>
        </tr>
        <tr>
          <td>Nama Pelanggan : </td>
          <td><input name="nama" type="text" required></td>
        </tr>
        <tr>
          <td>Lama Waktu Rental (per hari) : </td>
          <td><input name="hari" type="number" required></td>
        </tr>
        <tr>
          <td>Jenis Motor : </td>
          <td>
            <select name="jenis" id="" required>
              <option value="Scoopy">Scoopy</option>
              <option value="CBR">CBR</option>
              <option value="Ninja">Ninja</option>
            </select>
          </td>
        </tr>
        <tr>
          <td><button type="submit" name="submit">submit</button></td>
        </tr>
      </form>
    </table>
    <br>
    <?php
    include 'controller.php';
    $proses = new Perental();
    $proses->setHarga(80000, 75000, 70000);
    if (isset($_POST['submit'])) {
      $proses->nama_peminjam = $_POST['nama'];
      $proses->hari = $_POST['hari'];
      $proses->jenis = $_POST['jenis'];
      $proses->cetakBuktiRental();
    }
    ?>
  </center>
</body>

</html>