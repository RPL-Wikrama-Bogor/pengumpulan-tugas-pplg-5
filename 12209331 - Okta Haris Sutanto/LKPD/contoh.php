<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-color: #f0f0f0;
    background-image: url("img/city.gif");

  }

  .card {
    width: 50rem; /* Adjusted width */
    background: #07182E;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center; /* Adjusted alignment */
    overflow: hidden;
    border-radius: 20px;
    padding: 20px; /* Added padding */
  }

  .card h1{
    z-index: 1;
    color: white;
    font-size: 2em;
  }

  .card::before {
    content: '';
    position: absolute;
    width: 1000px;
    background-image: linear-gradient(180deg, rgb(0, 183, 255), rgb(255, 48, 255));
    height: 130%;
    animation: rotBGimg 3s linear infinite;
    transition: all 0.2s linear;
  }

  @keyframes rotBGimg {
    from {
      transform: rotate(0deg);
    }

    to {
      transform: rotate(360deg);
    }
  }

  .card::after {
    content: '';
    position: absolute;
    background: #07182E;
    inset: 5px;
    border-radius: 15px;
  }

  .card form {
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 2;
  }

  .card label {
    color: white;
    font-weight: bold;
    margin-bottom: 8px;
  }

  .card input[type="text"] {
    width: 80%;
    padding: 8px;
    border: none;
    border-radius: 4px;
    margin-bottom: 10px;
  }

  .card button {
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 8px 16px;
    cursor: pointer;
  }

  .card button:hover {
    background-color: #2980b9;
  }

  /* bagian ul li */
  .card ul {
    margin-top: 20px;
    width: 100%;
    color: white;
  }

  .card li {
    margin-bottom: 8px;
    color: white;
  }

  .card a {
    color: white;
    text-decoration: none;
  }
</style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
            <label for="hh">Input HH:</label>
            <br>
            <input type="number" name="hh" id="hh">
            <br>
            <label for="mm">Input MM:</label>
            <br>
            <input type="number" name="mm" id="mm">
            <br>
            <label for="ss">Input SS:</label>
            <br>
            <input type="number" name="ss" id="ss">
            <br>
            <button name="submit" id="submit">Kirim</button>
        </form>
        <?php
if (isset($_POST['submit'])) {
    if(isset($_POST["hh"]) && is_numeric($_POST["hh"])) {
        (isset($_POST["mm"]) && is_numeric($_POST["mm"])) {
            (isset($_POST["ss"]) && is_numeric($_POST["ss"])) {
                $hh = $_POST['hh'];
    $mm = $_POST['mm'];
    $sss = $_POST['ss'];

    $ss = $sss +1;

    if ($ss>=60) {
        $mm= $mm +1;
        $ss= 00;
    }
    if ($mm>=60) {
        $hh= $hh +1;
        $mm= 00;
        $ss = 00;
    }
    if ($hh>= 24) {
        $hh= 00;
        $mm= 00;
        $ss= 00;
    }

?>
    <h1>Hasil Penambahan</h1>
    <table border="1">
        <tr>
            <th>Data Waktu Sebelum</th>
            <th>Setelah Penambahan 1 detik</th>
        </tr>
        <tr>
            <td><?= $hh . " : " . $mm . " : " . $sss;?></td>
            <td><?= $hh . " : " . $mm . " : " . $ss;?></td>
        </tr>
    </table>
    <?php
    }else {
        echo ".";

            }
        }
    }
    }
    ?>
</body>
</html>
</body>
</html>
