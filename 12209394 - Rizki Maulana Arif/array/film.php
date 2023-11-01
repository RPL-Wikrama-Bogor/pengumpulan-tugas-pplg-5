<?php

$pilem =[
[
    "judul" => "Banteng takeashit", 
    "min-umur" => 40, 
    "harga" => 1000000000, 
],
[
    "judul" => "takeashit", 
    "min-umur" => 10, 
    "harga" => 300000, 
],
[
    "judul" => "kulit anda🩸", 
    "min-umur" => 18, 
    "harga" =>500, 
],

];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<center>
<body>
    <form action="" method="post">
        <input type="number" name="usia" placeholder="masukan usia anda.."><br><br>
        <select name="judul_id" id="">
            <option disabled selected hidden>[][][][]---pilihjudul----[][][][]</option>
            <?php foreach ($pilem as $key => $pil) :?>
                <option value="<?= $key; ?>"> <?=$pil["judul"]?> </option>
                <?php endforeach?>
        </select><br><br>
        <button type="submit" name="submit">BELI</button>
    </form>
    
</body>
</html>
<?php
if(isset($_POST["submit"])){
    $usia = $_POST["usia"];
    $array_id = $_POST["judul_id"];
    $minUsia = $pilem[$array_id]["min-umur"];
    $harga = $pilem[$array_id]["harga"];

    if ($usia < $minUsia) {
        echo "<h1 style= 'font-size:50px;color:red;';>CAN MAHI UMUR NONTON " . $pilem[$array_id]["judul"] . " IE MAH ". $pilem[$array_id]['min-umur'] . "+ </h1>";
    }else{
        echo "<br> bayar RP<h1 style= 'color:green'> "  . number_format($harga,2,',','.'). " - " .$pilem[$array_id]['judul']."</h1>";
    }


}