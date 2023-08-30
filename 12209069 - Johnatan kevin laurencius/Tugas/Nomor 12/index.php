<?php
    $hh = 0;
    $mm = 0;
    $ss = 0;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor 12</title>
    <style>
        .container {
            width: 300px;
            height: 400px;
            margin: 100px auto;
            padding: 20px 20px 20px 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .container h2 {
            text-align: center;
            margin: 20px 0px 50px 0px;
        }
        .container h3 {
            margin: 20px 0px 20px 0px;
        }
        .container label {
            font-weight: bold;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin: 2px 0px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        input{
            width: 100%;
            padding: 10px;
            margin: 15px 0px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .container p {
            font-size: 25px;
            text-align: center;
            margin: 2px 0px;
        }
    </style>
</head>
<body>
    <div class="container">
    <form action="" method="post">
        <label for="hh">Jam</label>
        <input type="number" name="hh">
        <br><br>
        <label for="mm">Menit</label>
        <input type="number" name="mm">
        <br><br>
        <label for="ss">Detik</label>
        <input type="number" name="ss">
        <br><br>
        <input type="submit" name="submit">
    </form>
    <?php
        if(isset($_POST['submit'])) {
            $hh = $_POST['hh'];
            $mm = $_POST['mm'];
            $ss = $_POST['ss'];

            $ss = $ss + 1;

            if($ss >= 59) {
                $mm = $mm + 1;
                $ss = 0;
                if($mm > 59) {
                    $hh = $hh + 1;
                    $mm = 00;
                    $ss = 00;
                    if($hh >= 23) {
                        $hh = 00;
                        $mm = 00;
                        $ss = 00;
                    }
                }
            }
            echo " <p> $hh : $mm : $ss </p>";
        }
    ?>
    </div>
</body>
</html>