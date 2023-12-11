<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <label for="sf">
            <input type="number" name="sf"><br><br>
        <button name="submit">Submit</button> <br>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
$sf = $_POST['sf'];
$sc = $sf/33.8;
if ($sc > 300) {
    echo "panas";
}elseif ($sc > 250) {
    echo "dingin";
}else {
    echo "normal";
}

}
?>