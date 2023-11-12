<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Nilai rata2</h1>
  <form method="POST" action="">
    <label for="">Input nilai PABP</label>
    <input type="number" name="nilai_pabp"><br>
    <label for="">Input nilai MTK</label>
    <input type="number" name="nilai_mtk"><br>
    <label for="">Input nilai DPK</label>
    <input type="number" name="nilai_dpk"><br>
    <button type="submit" name="submit">Submit</button>
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $nilai_pabp = $_POST['nilai_pabp'];
    $nilai_mtk = $_POST['nilai_mtk'];
    $nilai_dpk = $_POST['nilai_dpk'];

    $rata_rata = ($nilai_dpk + $nilai_pabp + $nilai_mtk) / 3;

    if ($rata_rata <= 100 && $rata_rata >= 80) {
      echo "A rata rata $rata_rata";
    } else if ($rata_rata < 80 && $rata_rata >= 75) {
      echo "B rata rata $rata_rata";
    } else if ($rata_rata < 75 && $rata_rata >= 65) {
      echo "C rata rata $rata_rata";
    } else if ($rata_rata < 65 && $rata_rata >= 45) {
      echo "D rata rata $rata_rata ";
    } else if ($rata_rata < 45 && $rata_rata >= 0) {
      echo "E rata rata $rata_rata";
    } else {
      echo "HADEHHHH";
    }
  }


  ?>
        <br>
        <a href="soal-no-9.php">Soal Sebelumnya</a>
        <br>
        <a href="soal-no-11.php">Soal Berikutnya</a>
</body>

</html>