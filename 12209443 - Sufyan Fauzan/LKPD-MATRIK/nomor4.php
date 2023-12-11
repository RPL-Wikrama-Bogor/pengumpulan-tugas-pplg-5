<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gaji Karyawan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
  html {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
  }

  body {
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f0f0;
  }

  .card {
    box-sizing: border-box;
    width: 400px;
    padding: 20px;
    background: rgba(217, 217, 217, 0.58);
    border: 1px solid white;
    box-shadow: 12px 17px 51px rgba(0, 0, 0, 0.22);
    backdrop-filter: blur(6px);
    border-radius: 17px;
    text-align: center;
    cursor: pointer;
    transition: all 0.5s;
    display: flex;
    flex-direction: column;
    align-items: center;
    font-weight: bolder;
    color: black;
  }

  .card:hover {
    border: 1px solid black;
    transform: scale(1.05);
  }

  .card:active {
    transform: scale(0.95) rotateZ(1.7deg);
  }

  .card form {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .card label,
  .card input,
  .card button {
    margin-bottom: 10px;
  }

</style>

<body>
  <div class="card">
    <h1>Gaji Karyawan</h1>
    <form method="POST" action="">
      <br>
      <label for="">Input Nama : </label>
      <input type="text" name="nama" autocomplete="off" required><br>
      <label for="">Input gaji pokok : </label>
      <input type="number" name="gaji_pokok" required><br>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
      $nama = $_POST['nama'];
      $gaji_pokok = $_POST['gaji_pokok'];

      $tunjangan = ((20 * $gaji_pokok) / 100);
      $pajak = (15 * ($gaji_pokok + $tunjangan) / 100);
      $gaji_bersih = $gaji_pokok + $tunjangan - $pajak;

      echo $nama . " menerima tunjangan sebesar Rp. " . $tunjangan . " <br> ,pajak sebesar Rp. " . $pajak . " <br> dan menerima gaji bersih sebesar Rp. " . $gaji_bersih;
    }

    ?>
  </div>
</body>

</html>