<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[name="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            
        }

        button[name="submit"]:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            margin-left:20px;
            font-size: 16px;
            color:black;
            background-color:white;
            padding:20px;
            width:100%;
            max-width:400px;
            box-shadow:0px 0px 10px rgba(0,0,0,0.2);
            border-radius:10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nomor 11</h1>
        <form action="" method="post">
            <input type="text" name="peg" placeholder="Masukan nomor golongan!">
            <button name="submit">Submit</button>
        </form>
    </div>
</body>
</html>


<?php

if(isset($_POST['submit'])){
    $peg=$_POST['peg'];
    $gol=substr($peg,0,1);
    $tanggal=substr($peg,1,2);
    $bulan=substr($peg,3,2);
    $tahun=substr($peg,5,4);
    $urut=substr($peg,9,2);
  echo "<div class='result'>";
  echo "<table border='2px'>";
  echo "<tr>";
  echo "<th> Golongan</th>";
  echo "<th> Tanggal</th>";
  echo "<th> no urut</th>";
  echo "</tr>";

    echo "<td>golongan ",$gol ."</td> ";
    echo "<td>".$tanggal ."-";
    if(strlen($peg) < 11){
        echo "No pegawai tidak sesuai";
    }elseif(strlen($peg) != 11){
      if($bulan==1){
        echo "januari";
      }elseif($bulan==2){
        echo "februari";
      }
      }elseif($bulan==3){
        echo "maret</td>";
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

      echo "-" . $tahun."</td>";
      echo "<td>, nomor urut = " ,$urut."</td>";
      
        echo "</tr>";
        echo "</table>";
        echo "</div>";
    }
?>
