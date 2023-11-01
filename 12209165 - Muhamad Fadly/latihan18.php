<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    input{
        width: 100px;
        padding: 5px;
        margin-left: 2%;
    }
    button{
        padding: 15px;
        color: black;
        font-weight: bold;
        background-color: #D8D9DA;
        border-radius: 40px;
        width: 100px;
        border: none;
    }
  </style>
</head>

<body>
  <form action="" method="post">
    <div id="box">
      <div style="display: inline; ">

        <label for="nama">Nama: </label>
        <input type="text" name="nama[]" required>
        <label for="kehadiran">Input Kehadiran: </label>
        <input type="number" name="kehadiran[]" required>
        <label for="mtk">MTK: </label>
        <input type="number" name="mtk[]" required>
        <label for="indo">Indo: </label>
        <input type="number" name="indo[]" required>
        <label for="ing">Ing: </label>
        <input type="number" name="ing[]" required>
        <label for="dpk">DPK: </label>
        <input type="number" name="dpk[]" required>
        <label for="agama">Agama: </label>
        <input type="number" name="agama[]" required><br>
        <p style="cursor: pointer; color: blue;" onclick="tambahInput()">Tambah Input Form</p>
        
      </div>
    </div>
    <button type="submit" name="submit">SUBMIT</button>
  </form>

  <script>
    let jumlahInput = 1;

    function tambahInput() {
      if (jumlahInput < 10) {
        let inputElement = `
                    <br><div style="display: flex; width:   ;">
                    <label for="nama">Nama: </label>
                    <input type="text" name="nama[]" required>
                    <label for="kehadiran">Input Kehadiran: </label>
                    <input type="number" name="kehadiran[]" required>
                    <label for="mtk">MTK: </label>
                    <input type="number" name="mtk[]" required>
                    <label for="indo">Indo: </label>
                    <input type="number" name="indo[]" required>
                    <label for="ing">Ing: </label>
                    <input type="number" name="ing[]" required>
                    <label for="dpk">DPK: </label>
                    <input type="number" name="dpk[]" required>
                    <label for="agama">Agama: </label>
                    <input type="number" name="agama[]" required>   
                   
                </div> <br> <br> `;
        document.getElementById('box').innerHTML += inputElement;
        jumlahInput++;
      }
    }
  </script>

  <?php
  if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $hadir = $_POST['kehadiran'];
    $mtk = $_POST['mtk'];
    $indo = $_POST['indo'];
    $ing = $_POST['ing'];
    $dpk = $_POST['dpk'];
    $agama = $_POST['agama'];

    $data = [];
    $jumlahData = count($nama);

    for ($i = 0; $i < $jumlahData; $i++) {
      $data[$i] = [
        'nama' => $nama[$i],
        'kehadiran' => $hadir[$i],
        'mtk' => $mtk[$i],
        'indo' => $indo[$i],
        'ing' => $ing[$i],
        'dpk' => $dpk[$i],
        'agama' => $agama[$i]
      ];
    }

    $totalData =
      array_sum(array_column($data, 'mtk')) +
      array_sum(array_column($data, 'indo')) +
      array_sum(array_column($data, 'ing')) +
      array_sum(array_column($data, 'dpk')) +
      array_sum(array_column($data, 'agama'));

    $rataRata = round($totalData / (count($data) * 5));

    echo "Total Data: $totalData<br>";

    $dataKehadiran = [];
    echo "<p>Daftar Kehadiran : </p>";
    foreach ($data as $item) {
      echo "{$item['nama']} <br>";
      echo "{$item['kehadiran']}% <br>";
      echo "Total Nilai: " . ($item['mtk'] + $item['indo'] + $item['ing'] + $item['dpk'] + $item['agama']) . "<br>". "<br>";
      $dataKehadiran[] = $item['kehadiran'];
    }

    $rataRataKehadiran = round(array_sum($dataKehadiran) / count($dataKehadiran));

    echo "Rata-rata Kehadiran: $rataRataKehadiran%<br>";

    // ... (your previous code)

    $juara = [];
    foreach ($data as $item) {
      if ($rataRata >= 80 && $item['kehadiran'] == 100) {
        $juara[] = $item['nama']; 
      }
    }

    if (!empty($juara)) {
      echo "Juara: ";
      for ($i = 0; $i < count($juara); $i++) {
        echo $juara[$i];
        if ($i < count($juara) - 1) {
          echo ", ";
        }
      }
    }

    // ... (the rest of your code)


  }
  ?>
</body>

</html>