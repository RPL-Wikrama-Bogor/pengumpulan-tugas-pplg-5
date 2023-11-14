<?php
    $suhu_fahrenheit;
    $suhu_celcius;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 9</title>
</head>
<body>
    <h2>Suhu</h2>

    <form method="post" action="#">
        <table>
            <td>
                <tr> Suhu Fahrenheit </tr>
                <tr>  :  </tr>
                <tr><input type="number" name="suhu_fahrenheit"></tr>
            </td>
            <td>
                <tr> <input type="submit" name="submit" value="Cetak"></tr>
            </td>
        </table>
    </form>

    <?php
        if (isset($_POST['submit'])) {
            $suhu_fahrenheit = $_POST['suhu_fahrenheit'];

            $suhu_celcius = 5/9 * ($suhu_fahrenheit - 32);

            if ($suhu_celcius > 300) {
                echo "Suhu anda panas";
            }
            elseif ($suhu_celcius < 250) {
                echo "Suhu anda dingin";
            }
            else {
                echo "Suhu anda normal";
            }
        }
    ?>
    
</body>
</html>