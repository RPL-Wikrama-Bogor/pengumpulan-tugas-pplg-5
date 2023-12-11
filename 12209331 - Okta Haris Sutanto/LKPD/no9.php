<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<label for="inputsuhu">Input suhu:</label><br>
<input type="number" id="inputsuhu" name="inputsuhu" required autofocus><br><br>

<button name="submit">Submit</button> <br>

</form>
 <?php

    if( isset($_POST["submit"])) {

    $fahrenheit = $_POST['inputsuhu'];
    
    // $celcius = ( $fahrenheit / 33.8);
    $celcius = ($fahrenheit - 32) * 5/9;

    if ( $celcius > 300) {
        echo "panas";
    } elseif ( $celcius < 100) {
        echo "dingin";
    } else {
        echo "normal";
    }
    
    }

?>
</body>
</html>