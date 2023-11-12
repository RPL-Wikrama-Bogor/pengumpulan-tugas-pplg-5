<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No 6</title>
</head>
<body>
    <h3>Mengubah Detik</h3>
    <form action="#" method="post">
    <table>
        <tr>
            <td>
                <label for="totaldetik">
                    Masukan Total Detik : <input type="number" name="totaldetik">
            </td>
            <td>
            <button name="submit">Submit</button>
            </td>
        </tr>
    </table>    

    </form>
</body>
</html>
<br>
<?php
if(isset($_POST['submit'])){
    $totalDetik = $_POST['totaldetik'];

$jumlahJam = floor($totalDetik / 3600);
$sisaDetik = $totalDetik % 3600;
$jumlahMenit = floor($sisaDetik / 60);
$sisaDetik = $sisaDetik % 60;
echo "Hasil : $jumlahJam jam $jumlahMenit menit $sisaDetik detik\n";
}
    ?>