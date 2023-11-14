<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grade nilai</title>
</head>
<body>
  <center><h2> masukan nilai siswa</h2>
  <form method="POST" action="#">
    <table>
    <tr>
      <td>nilai pabp</td>
      <td>:</td>
     <td> <input type="text" name="pabp" id="pabp"></td>
    </tr>
    <tr>
    <tr>
      <td>nilai mtk</td>
      <td>:</td>
     <td> <input type="text" name="mtk" id="mtk"></td>
    </tr>
    <tr>
      <td>nilai dpk</td>
      <td>:</td>
     <td> <input type="text" name="dpk" id="dpk"></td>
      <tr>
         <td> 
          <input type="submit" name="submit" value="submit"></td>
         </center>
         </td>
         </tr>

    

  <?php

  if (isset($_POST['submit'])) {
    $pabp = $_POST['pabp'];
    $mtk = $_POST['mtk'];
    $dpk = $_POST['dpk'];
    $rata;
    $rata = ($pabp + $mtk + $dpk) / 3;

    if($rata <= 100 && $rata >= 80){
      echo "<h1>Grade A</h1>";
    }
    elseif($rata <= 80 && $rata >= 75){
      echo "<h1>Grade B</h1>";
    }
    elseif($rata <= 75 && $rata >= 65){
      echo "<h1>Grade C</h1>";
    }
    elseif($rata <= 65 && $rata >= 45){
      echo "<h1>Grade D</h1>";
    }
    elseif($rata <= 45 && $rata >= 0){
      echo "<h1>Grade E</h1>";
    }
    else{
      echo "<h1>Angka tidak memenuhi persyaratan</h1>";
    }
  }
  ?>
</body>
</html>