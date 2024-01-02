<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>NO 11</h1>
<form action="" method="post">

    <body>
        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[name="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button[name="submit"]:hover {
            background-color: #555;
        }

        .result {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        </style>
        <input type="text" name="peg" placeholder="Masukan nomor golongan!">
        <button name="submit">Submit</button>

    </body>
</form>

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
          echo "oktober";
        echo "agustus";
      }elseif($bulan==9){
        echo "september";
      }elseif($bulan==10){
      }elseif($bulan==11){
        echo "november";
      }else{
        echo "desember";
      }

      echo "-" . $tahun;
      echo " , nomor urut = " ,$urut;
     


    }