<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Cari Juara Kelas</title>
</head>
<body>

<form action="cari_juara_kelas.php" method="post">
  <input type="hidden" name="jumlah_siswa" value="15">
  <input type="hidden" name="mata_pelajaran" value="MTK,INDO,INGG,DPK,Agama">

  <h1>Cari Juara Kelas</h1>

  <input type="text" name="nama_siswa" placeholder="Masukkan nama siswa">

  <table>
    <tr>
      <th>Mata Pelajaran</th>
      <th>Nilai</th>
    </tr>
    <tr>
      <td>MTK</td>
      <td><input type="number" name="mtk"></td>
    </tr>
    <tr>
      <td>INDO</td>
      <td><input type="number" name="indo"></td>
    </tr>
    <tr>
      <td>INGG</td>
      <td><input type="number" name="ingg"></td>
    </tr>
    <tr>
      <td>DPK</td>
      <td><input type="number" name="dpk"></td>
    </tr>
    <tr>
      <td>Agama</td>
      <td><input type="number" name="agama"></td>
    </tr>
  </table>

  <input type="number" name="kehadiran" placeholder="Masukkan jumlah kehadiran">

  <input type="submit" value="Cari">
</form>

<?php

// Deklarasi variabel
$jumlah_siswa = $_POST['kehadiran'];
$mata_pelajaran = explode(",", $_POST['mata_pelajaran']);

// Inisialisasi variabel
$siswa = [];
for ($i = 0; $i < $jumlah_siswa; $i++) {
  $siswa[$i] = ["nama" => "", "mtk" => 0, "indo" => 0, "ingg" => 0, "dpk" => 0, "agama" => 0, "kehadiran" => 0];
}

// Input data siswa
for ($i = 0; $i < $jumlah_siswa; $i++) {
  $siswa[$i]["nama"] = $_POST['nama_siswa'];

  for ($j = 0; $j < count($mata_pelajaran); $j++) {
    $siswa[$i][$mata_pelajaran[$j]] = $_POST['mtk'];
  }

  $siswa[$i]["kehadiran"] = $_POST['kehadiran'];
}

// Hitung rata-rata nilai
for ($i = 0; $i < $jumlah_siswa; $i++) {
  $siswa[$i]["rata_rata"] = ($siswa[$i]["mtk"] + $siswa[$i]["indo"] + $siswa[$i]["ingg"] + $siswa[$i]["dpk"] + $siswa[$i]["agama"]) / 5;
}

// Cari juara kelas
$juara = $siswa[0];
for ($i = 1; $i < $jumlah_siswa; $i++) {
  if ($siswa[$i]["rata_rata"] > $juara["rata_rata"] && $siswa[$i]["kehadiran"] == 100) {
    $juara = $siswa[$i];
  }
}

// Tampilkan juara kelas
echo "Juara kelas adalah " . $juara["nama"];
?>

</body>
</html>