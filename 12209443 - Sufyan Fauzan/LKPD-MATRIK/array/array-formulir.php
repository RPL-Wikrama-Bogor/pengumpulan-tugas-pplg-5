<?php 
$list_film = [
    [
        "judul" => "Upin Ipin",
        "min_usia" => 18,
        "harga" => 30000
    ],
    [
        "judul" => "Tokyo Drift",
        "min_usia" => 21,
        "harga" => 40000
    ]
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="usia" id="" placeholder="Masukkan usia...">
        <select name="judul" id="">
            <option disabled hidden selected>- - - Pilih Judul Film - - -</option>
            <?php foreach($list_film as $key => $item) : ?>
                <option value="<?= $key; ?>"><?= $item['judul']; ?></option>
            <?php endforeach ?>
        </select>
        <button type="submit" name="beli">Beli</button>
    </form>

    <?php 
    if(isset($_POST['beli'])) {
        $usia = $_POST['usia'];
        $arrayID = $_POST['judul'];
        $minUsia = $list_film[$arrayID]["min_usia"];
        $harga = $list_film[$arrayID]['harga'];

        if($usia < $minUsia) {
            echo "<h4 style='color: red'> Usia belum cukup </h4>";
        } else {
            echo "<h4 style='color: green'> Harga yang harus dibayar Rp. " . number_format($harga, 2, ',', '.') . "</h4>";
        }
    }
    ?>
</body>
</html>