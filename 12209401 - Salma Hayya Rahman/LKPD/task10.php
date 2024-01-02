<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="agama" id="" placeholder="Nilai PABP"> <br><br>
        <input type="number" name="matematika" id="" placeholder="Nilai Matematika"> <br><br>
        <input type="number" name="jurus" id="" placeholder="Nilai DPK"> <br><br>
        <input type="submit" value="submit"> 
    </form>
</body>
</html>
<?php
    if ($_SERVER ['REQUEST_METHOD'] == "POST") {
        $pai = $_POST['agama'] ;
        $mat = $_POST['matematika'] ;
        $dpk = $_POST['jurus'] ;

        $rata = ($pai + $mat + $dpk ) / 3 ;

        if ($rata <= 100 && $rata >= 80) {
           echo "$rata Grade A" ;
        }elseif ($rata < 80 && $rata >=75) {
            echo "$rata Grade B" ;
        }elseif ($rata < 75 && $rata >=65) {
            echo "$rata Grade C" ;
        }elseif ($rata < 65 && $rata >=45) {
            echo "$rata Grade D" ;
        }elseif ($rata < 45 && $rata >=0) {
            echo "$rata Grade E" ;
        }else {
            echo "Angka tidak memenuhi persyaratan" ;
        }
    }
?>