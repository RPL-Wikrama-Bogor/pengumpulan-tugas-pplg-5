<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suhu</title>
</head>
<body>
<form action="" method="post">
    <h1> masukan jam</h1>
   <input type="text" name="hh" ><br>
    <h1> masukan menit</h1>
   <input type="text" name="mm" ><br>
    <h1> masukan detik</h1>
   <input type="text" name="ss" ><br>
    <br><button type="submit" name="submit">submit</button>
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
   

    
    $hh = $_POST['hh'];
    $mm = $_POST['mm'];
    $ss = $_POST['ss'];

    $ss = $ss +1;
    if ($ss>=60) {
        $mm = $mm+1;
        $ss=00 ;

        if ($mm>=60) {
            $hh =$hh +1;
            $mm = 00;
            $ss = 00;

            if ($hh>=24) {
                $hh=00;
                $mm=00;
                $ss=00;
            }
        }
        
    }else{
        $ss=$ss ;
    }
        echo"jam".$hh;
        echo"menit".$mm;
        echo"detik".$ss;
        
    
    }
