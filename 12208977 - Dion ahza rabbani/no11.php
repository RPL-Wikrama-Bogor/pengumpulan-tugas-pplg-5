<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>Nomor 11</h1>
<form action="" method="post">
<body>
    <input type="text" name="peg" placeholder="Masukan nomor golongan!">
    <button name="submit">Submit</button>

</body></form>

</html>

<?php

if(isset($_POST['submit'])){
    $peg=$_POST['peg'];
    $gol=substr($peg,0,1);
    $tanggal=substr($peg,1,2);
    $bulan=substr($peg,3,2);
    $tahun=substr($peg,5,4);
    $urut=substr($peg,9,2);

    echo "golongan ",$gol .", ";
    echo $tanggal ."-";
    if(strlen($peg) < 11){
        echo "No pegawai tidak sesuai";
    }elseif(strlen($peg) != 11){
      if($bulan==1){
        echo "januari";
      }elseif($bulan==2){
        echo "februari";
      }
      }elseif($bulan==3){
        echo "maret";
      }
      elseif($bulan==4){
        echo "april";
      }elseif($bulan==5){
        echo"mei";
      }elseif($bulan==6){
        echo "juni";
      }elseif($bulan==7){
        echo "juli";
      }elseif($bulan==8){
        echo "agustus";
      }elseif($bulan==9){
        echo "september";
      }elseif($bulan==10){
        echo "oktober";
      }elseif($bulan==11){
        echo "november";
      }else{
        echo "desember";
      }

      echo "-" . $tahun;
      echo ", nomor urut = " ,$urut;
     


    }

