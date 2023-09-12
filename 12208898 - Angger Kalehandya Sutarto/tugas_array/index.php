<?php 
$tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];
$implode_tabungan = implode(', ', $tabungan);
$all_tabungan = number_format(array_sum($tabungan), 2, ',', '.');
$hapus_duplikat_tabungan = array_unique($tabungan);
$pecahan = implode(", ", $hapus_duplikat_tabungan);
$min_tabungan = min($tabungan);
$max_tabungan = max($tabungan);
asort($tabungan);
$terkecil = implode(', ', $tabungan);
arsort($tabungan);
$terbesar = implode(', ', $tabungan);
array_splice($tabungan,0,2, 100000);
$implodeSplice = implode(', ', $tabungan); 
array_push($tabungan, 20000);
$nambahUang = implode(', ', $tabungan);
asort($tabungan);
$urutanAkhir = implode(', ', $tabungan);
$lastTabungan = number_format(array_sum($tabungan), 2, ',', '.');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Uang yang terdapat di tabungan saya adalah: <b><?= $implode_tabungan; ?></b></p>
    <p>Jumlah tabungan saya adalah: Rp. <b><?= $all_tabungan; ?></b></p>
    <p>Didalam tabungan saya terdapat uang pecahan: <b><?= $pecahan; ?></b></p>
    <p>Pecahan uang terkecil adalah: <b><?= $min_tabungan; ?></b></p>
    <p>Pecahan uang terbesar adalah: <b><?= $max_tabungan; ?></b></p>
    <p>Jika diurutkan dari yang terkecil maka uang yang berada di tabungan adalah: <b><?= $terkecil; ?></b></p>
    <p>Jika diurutkan dari yang terbesar maka uang yang berada di tabungan adalah: <b><?= $terbesar; ?></b></p>
    <p>Saya ingin mengganti pecahan <b>50000</b> yang ada di tabungan menjadi 100000, maka uang yang berada di tabungan menjadi <b><?php echo $implodeSplice; ?></b></p>
    <p>Hari ini saya menabung sebesar <b>20000</b>, maka kini uang yang berada di tabungan saya adalah: <b><?= $nambahUang; ?></b></p>
    <p>Jika diurutkan dari yang terkecil kini tabungan saya menjadi: <b><?= $urutanAkhir; ?></b></p>
    <p>Maka jumlah tabungan saya saat ini adalah: <b>Rp. <?= $lastTabungan; ?></b></p>
</body>
</html>