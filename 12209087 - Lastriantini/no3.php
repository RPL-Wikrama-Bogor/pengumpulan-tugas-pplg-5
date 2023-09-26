<?php
    $a;
    $b;
    $c;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 3</title>
</head>
<body>
    
    <h2>Mencari Bilangan Terbesar</h2>
    <form method="post" action="#">
        <table>
            <tr>
                <td> Bilangan 1 </td>
                <td>  :  </td>
                <td><input type="number" name="a"></td>
            </tr>
            <tr>
                <td> Bilangan 2 </td>
                <td>  :  </td>
                <td><input type="number" name="b"></td>
            </tr>
            <tr>
                <td> Bilangan 3 </td>
                <td>  :  </td>
                <td><input type="number" name="c"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Kirim"></td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $a = $_POST["a"];
        $b = $_POST["b"];
        $c = $_POST["c"];

        if ($a>$b && $a>$c) {
            echo "Nilai terbesar adalah $a";
        }
        elseif ($b>$a && $b>$c) {
            echo "Nilai terbesar adalah $b";
        }
        elseif($c>$a && $c>$b) {
            echo "Nilai terbesar adalah $c";
        }
        else {
            echo "Sama Besar";
        }
    }
    ?>
</body>
</html>