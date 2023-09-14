<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 2px 8px 20px 0 rgba(0, 0, 0, 0.2);
            padding: 30px;
            text-align: center;
            width: 30%;
            margin: auto ;
            margin-left: 450px;
            margin-right: 450px;
            margin-top: 100px;
        }

        button {
            border: solid, black;
            border-radius: 5px;
            color: black;
            cursor: pointer;
            padding: 8px 18px;
            text-align: center;
            font-size: 15px;
            transition-duration: 0.4s;
            margin-top: 40px;
        }

        button:hover {
            background-color: #0056b3;
        }


    </style>
<body>
<div class="card">
    <form action="#" method="post">
        <label for="jam">
            <p>input jam : </p> <br>
            <input type="text" name="hh"><br>
        <label for="menit">
            <p>input menit : </p> <br>
            <input type="number" name="mm"><br>
        <label for="detik">
            <p>input detik : </p>
            <input type="number" name="ss"> <br>
        <button name="submit">Submit</button> <br>
    </form>
</div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
$hh = $_POST['hh'];
$mm = $_POST['mm'];
$ss = 1 + $_POST['ss'];
if( $ss >= 60 ) {
    $mm = $mm+1;
    $ss = 00;
    if( $mm >= 60 ) {
        $hh = $hh + 1;
        $mm = 00;
        $ss = 00;
        if($hh>=24){
            $hh = 00;
            $mm = 00;
            $ss = 00;
        }
    }
}
elseif( $mm >= 60 ) {
    $hh = $hh + 1;
    $mm = 00;
    if($hh>=24){
        $hh = 00;
        $mm = 00;
    }
}
elseif($hh>=24){
    $hh = 00;
}

echo "jam : ". $hh . "<br> menit : ". $mm. "<br> detik : ". $ss;

}