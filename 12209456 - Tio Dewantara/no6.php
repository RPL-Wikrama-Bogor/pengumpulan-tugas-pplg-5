<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eman</title>
</head>
<center>
    <h2>NO ^</h2>
<form action="" method="post">
<body>
  
    <input type="number" name="hasil" placeholder="waktu"><br></br>
    <button name="submit">PENCET</button><br></br>
    
</body></form>
</html>
<?php
if(isset($_POST['submit'])){
$hasil=$_POST['hasil'];


 
if($hasil>3600)
{
$jam=floor($hasil/3600);
$jam1=$hasil%3600;
$menit=floor($jam1/60);
$detik=$hasil%60;

echo "Jam=".$jam;echo"<br>";
echo "Menit=".$menit;echo"<br>";
echo "Detik=".$detik;echo"<br>"; 
    
}elseif($hasil<3600){
$menit=floor($hasil/60);
$detik=$hasil%60;
echo "Menit=".$menit;echo"<br>";
echo "Detik=".$detik;echo"<br>"; 
}else{
    echo "Detik=".$hasil;
}

}
?>
</center>