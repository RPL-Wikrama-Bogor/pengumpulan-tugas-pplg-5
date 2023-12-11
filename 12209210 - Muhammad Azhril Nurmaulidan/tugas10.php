<!DOCTYPE html>
<html>
<head>
     <title>Nomor 10</title>
</head>
<body>
    <form action= "#" method = "post" name = "formAngka">
        PABP <br> <input type = "number" name = "mape1"> </input> <br><br>
        Matematika <br> <input type = "number" name = "mape2"> </input> <br><br>
        DPK <br> <input type = "number" name = "mape3"> </input> <br><br>
        <br> <input type = "submit" name = "submit"> </input> <br><br>  
</form>

<?php

if ($_SERVER ['REQUEST_METHOD'] == "POST") {

    $mape2 = $_POST ["mape2"];
    $mape3 = $_POST ["mape3"];
    $mape1 = $_POST ["mape1"];

$rata = $mape1+$mape2+$mape3;
$rata = $rata/3;
    
   if ($rata>100) {
    echo "Angka Tidak Memenuhi Syarat (K)";
   }
   else if ($rata<=100 && $rata>=80) {
    echo "A";
   }
   elseif ($rata<=80 && $rata>=75) {
    echo "B";
   }
   else if ($rata<=75 && $rata>=65){
    echo "C";
   }
   else if ($rata<=65 && $rata>=45){
    echo "D";
   }
   else if ($rata<=45 && $rata>=0){
    echo "E";
   }
   else{
   echo "Angka Tidak Memenuhi Syarat (K)";
   }
}
?>
</body>
</html>