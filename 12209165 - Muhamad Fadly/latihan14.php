<!DOCTYPE html>
<html>
<head>
    <title>ganjil genap</title>
</head>
<body>
    <h1>mencari bilangan ganjil genap </h1>
    
    
    <ul>
    <?php
    $i = 1;
   for ($i=0; $i <=50; $i++) { 
        if ($i%2==1) {
            echo "<li>$i=bilangan ganjil</li>";

        }
   }
   
    ?>
    </ul>