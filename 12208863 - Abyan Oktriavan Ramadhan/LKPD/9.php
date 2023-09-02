<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LKPD 9</title>
</head>

<body>
    <form action="" method="post">
        <label for="">Suhu Farenhaite</label>
        <input type="number" name="suhuF" id="suhuF">
        <input type="submit" name="submit">
    </form>

    <?php 
    if(isset($_POST['submit'])){
        $Fahrel = $_POST['suhuF'];

        $suhu_celcius = ($Fahrel - 32) * (5/9);

        if ($suhu_celcius > 300) {
            echo "suhu panas";
          } elseif ($suhu_celcius > 250) {
            echo "suhu dingin";
          } else {
            echo "suhu normal";
          }
        }
    ?>
</body>
</html>