<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Nomor 12</h1>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><center>
    <form action="#" method="post">
        <div class="container">
        <label for="jam">
        <input type="number" name="jam"placeholder="jam"><br><br>
        <label for="menit">
           <input type="number" name="menit"placeholder="menit"><br><br>
        <label for="detik">
            <input type="number" name="detik" placeholder="detik"><br><br>
            <button name="submit">Submit</button> <br></center>
        </div>
    </form>
</body>
</html>
<style>
    body{
        background-color:#f7f7f7;
        text-align: center;
            justify-content:center;
            
    }
.container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            
        }
        input[type="number"]{
            border-radius:5px;
            text-align:center;
            height:25px;
            width:100px;
            font-style:italic;
            

        }
        button[name="submit"]{
            border-radius:5px;
            background-color:rgb(46, 138, 84);
            cursor: pointer;
            height:25px;
            width:78;

        }
        .keluar{
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            max-width: 200px;
            width: 100%;
            margin-left:42%;
            margin-top:20px;
            font-weight:bold;
        }
</style>
<?php

if(isset($_POST['submit'])){
$j =$_POST['jam'];
$m =$_POST['menit'];
$d =$_POST['detik'];

   $d=$d+1;
   if($d>=60){
    $m=$m+1;
    $d=00;

    }if($m>=60){
        $j=$j+1;
        $m=00;
        $d=00;
    } if($j>=24){
        $j=00;
        $m=00;
        $d=00;
    }else{
        echo "<div class='keluar'>".$j." : ".$m." : ".$d."</div>";
    }
  
   

   





}



?>
