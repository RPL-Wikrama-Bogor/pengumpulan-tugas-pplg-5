<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap');

  body {
    font-family: 'Patrick Hand', cursive;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  input {
    width: 100px;
    height: 30px;
    margin-right: 10px;
    display: inline-block;
  }

  button {
    margin-right: 50px;
    margin-left: 20px;
    padding: 8px 15px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  button:hover {
    background-color: #0056b3;
  }

  p {
    margin: 10px 0;
    cursor: pointer;
    color: #007bff;
  }
</style>

<body>
  <div class="container">
    <form action="" method="post">
      <div id="box">
        <div style="display: flex; width: fit-content;">
          <label for="nama">Nama : </label>
          <input type="text" name="nama[]" required>
          <label for="kehadiran">Kehadiran(%) : </label>
          <input type="number" name="kehadiran[]" required min="0" max="100">
          <label for="mtk">MTK : </label>
          <input type="number" name="mtk[]" required min="0" max="100">
          <label for="indo">Indo : </label>
          <input type="number" name="indo[]" required min="0" max="100">
          <label for="ing">Inggris : </label>
          <input type="number" name="ing[]" required min="0" max="100">
          <label for="dpk">DPK : </label>
          <input type="number" name="dpk[]" required min="0" max="100">
          <label for="agama">Agama : </label>
          <input type="number" name="agama[]" required min="0" max="100">
          <p style="cursor: pointer; color: blue;" onclick="tambahInput()">Tambah Input</p>
          <button type="submit" name="submit">Kirim</button>
        </div>
      </div>
    </form>

    <script>
      let jumlahInput = 1;

      function tambahInput() {
        if (jumlahInput < 10) {
          let inputElement = `
                    <br><div style="display: flex; width: fit-content;">
                    <label for="nama">Nama : </label>
                    <input type="text" name="nama[]" required>
                    <label for="kehadiran">Kehadiran(%) : </label>
                    <input type="number" name="kehadiran[]" required min="0" max="100">
                    <label for="mtk">MTK : </label>
                    <input type="number" name="mtk[]" required min="0" max="100">
                    <label for="indo">Indo : </label>
                    <input type="number" name="indo[]" required min="0" max="100">
                    <label for="ing">Inggris : </label>
                    <input type="number" name="ing[]" required min="0" max="100">
                    <label for="dpk">DPK : </label>
                    <input type="number" name="dpk[]" required min="0" max="100">
                    <label for="agama">Agama : </label>
                    <input type="number" name="agama[]" required min="0" max="100">
                </div>`;
          document.getElementById('box').innerHTML += inputElement;
          jumlahInput++;
        }
      }
    </script>

    <?php
    if (isset($_POST['submit'])) {
      $nama = $_POST['nama'];
      $kehadiran = $_POST['kehadiran'];
      $mtk = $_POST['mtk'];
      $indo = $_POST['indo'];
      $ing = $_POST['ing'];
      $dpk = $_POST['dpk'];
      $agama = $_POST['agama'];

      $jumlahData = count($nama);

      $output = []; // array untuk menyimpan output

      for ($i = 0; $i < $jumlahData; $i++) {
        $rataRata = ($mtk[$i] + $indo[$i] + $dpk[$i] + $agama[$i] + $ing[$i]);

        if ($rataRata >= 475 && $kehadiran[$i] == 100) {
          $juaraKelas = "Juara Kelas";
        } else {
          $juaraKelas = "-";
        }

        $output[] = [
          'nama' => $nama[$i],
          'rata_rata' => $rataRata,
          'kehadiran' => $kehadiran[$i],
          'juara_kelas' => $juaraKelas
        ];
      }
    }

    // Menampilkan hasil
    if (!empty($output)) {
      foreach ($output as $data) {
        echo "Nama: " . $data['nama'] . "<br>";
        echo "Rata-rata: " . $data['rata_rata'] . "<br>";
        echo "Kehadiran: " . $data['kehadiran'] . "% <br>";
        echo "--------------------------------------------------------";
        echo "<br>";
      }
    }
    if (!empty($output)) {
      echo "Juara Kelas: ";
      $juaraKelasNames = [];

      foreach ($output as $data) {
        if ($data['juara_kelas'] == "Juara Kelas") {
          $juaraKelasNames[] = $data['nama'];
        }
      }

      if (!empty($juaraKelasNames)) {
        echo implode(', ', $juaraKelasNames);
      } else {
        echo "-";
      }
    }

    ?>
  </div>
</body>

</html>