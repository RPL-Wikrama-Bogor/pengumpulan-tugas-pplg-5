<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  input {
    width: 100px;
    height: 30px;
    display: inline-block;
  }
</style>

<body>
  <form action="" method="post">
    <div id="box">
      <div style="display: flex; width: fit-content;">
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
        <p style="cursor: pointer; color: blue;" onclick="tambahInput()">Tambah Input Form</p>
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
                </div>`;
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

    $dataKehadiran = [];
    foreach ($data as $item) {
      $dataKehadiran[] = $item['kehadiran'];
    }

    $rataRataKehadiran = round(array_sum($dataKehadiran) / count($dataKehadiran));

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
    }else {
      echo "Tidak ada juara";
    }

  }
  ?>
</body>

</html>