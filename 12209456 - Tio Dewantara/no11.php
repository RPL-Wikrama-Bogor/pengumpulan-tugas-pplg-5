<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sebelas</title>
</head>
<style>
        body {
            background-color: #F5F5F5;
            font-family: Arial, sans-serif;
        }
        .peg{
            width: 400px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            
        }
        .peg h2 {
            text-align: center;
            color: #7EAA92;
        }
        input[type="number"] {
            width: 80%;
            padding: 9px;
            margin-bottom: 10px;
            border: 2px solid #ccc;
            border-radius: 4px;
        }
        button[name="submit"] {
            display: block;
            width: 30%;
            padding: 10px;
            background-color: #7EAA92;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            text-align: center;
        }
    </style>
<body><center>  
    <form action="" method="post">
      <div class="peg">
       <h2>NO 10</h2>
        <input type="number" name="peg" placeholder="No Pegawai"><br></br>
        <button name="submit">PENCET</button><br></br>
      </div>
</body>
</form>
</html>
<?php
if(isset($_POST['submit'])){
    $peg =$_POST['peg'];

$golongan = substr($peg,0,1);
$tanggal = substr($peg,1,2);
$bulan = substr ($peg,3,2);
$tahun = substr ($peg,5,4);
$urutan = substr ($peg,9,2);

echo"No golongan ",$golongan. " , ";
echo  "Lahir pada tanggal " ,$tanggal."  ";
   if (strlen($peg) < 11) {
        echo"No peg tidak sesuai";


}
if ($bulan==1) {
    echo"Januari";
 }elseif ($bulan==2) {
    echo "Febuari";
 }elseif ($bulan==3) {
    echo "Maret";
 }elseif ($bulan==4) {
    echo "April";
 }elseif ($bulan==5) {
    echo"Mei";  
 }elseif ($bulan==6) {
    echo"Juni";
 }elseif ($bulan==7) {
    echo"Juli";
 }elseif ($bulan==8) {
    echo"Agustus";
 }elseif ($bulan==9) {
    echo"September";
 }elseif ($bulan==10) {
    echo"Oktober";
 }elseif ($bulan==11) {
    echo"November";
 }else {
    echo "Desember";
 }

 $tanggal_lahir= $tahun . $bulan . $tahun;
 

echo " ". $tahun. " , ";
echo"Urut ".$urutan;

}
?>
</center>