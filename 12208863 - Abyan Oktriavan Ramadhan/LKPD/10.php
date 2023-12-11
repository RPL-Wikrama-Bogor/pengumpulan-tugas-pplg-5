<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Input Nilai Siswa</h1>
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
      echo "A";
    } else if ($rata_rata < 80 && $rata_rata >= 75) {
      echo "B";
    } else if ($rata_rata < 75 && $rata_rata >= 65) {
      echo "C";
    } else if ($rata_rata < 65 && $rata_rata >= 45) {
      echo "D";
    } else if ($rata_rata < 45 && $rata_rata >= 0) {
      echo "E";
    } else {
      echo "KAMU NOOB DEK";
    }
  }


  ?>

</body>

</html>