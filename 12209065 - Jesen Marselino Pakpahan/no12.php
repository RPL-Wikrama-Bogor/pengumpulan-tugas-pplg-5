<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>NO 12</h1>

<body>
    <form action="#" method="post">
        <label for="jam">
            <input type="text" name="jam"><br><br>
            <label for="menit">
                <input type="number" name="menit"><br><br>
                <label for="detik">
                    <input type="number" name="detik">
                    <button name="submit">Submit</button> <br>

    </form>
</body>

</html>

<?php
if(isset($_POST['submit'])){

    $j =$_POST['jam'];
    $m =$_POST['menit'] ;
    $d =$_POST['detik'];

    
}
?>