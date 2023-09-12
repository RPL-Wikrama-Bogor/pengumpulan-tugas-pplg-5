<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop Output with CSS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .loop-container {
            background-color: #fff;
            border-radius: 5px;
            border: 1px dotted grey;
            box-shadow: 0px 0px 10px rgba(69, 137, 168) ;
            padding: 20px;
            text-align: center;
            margin: 20px;
            position: absolute;
            margin-top : -10rem ;
        }
        .loop-heading {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .loop-output {
            font-size: 18px;
            line-height: 1.5;
            color: #333;
        }
        .loop-cont{
            background-color: #fff;
            border-radius: 5px ;
            border: 1px dashed grey;
            box-shadow: 0px 0px 10px rgba(69, 137, 168) ;
            padding: 20px;
            text-align: center;
            margin: 20px;
            margin-top: 10rem;
            position: absolute;
            
        }

        .loop-head{
            font-size: 24px;
            margin-bottom: 20px;
        }

        .loop-out{
            font-size: 18px;
            line-height: 1.5;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="loop-container">
        <div class="loop-heading">Ini Perulangan Menggunakan FOR</div>
        <div class="loop-output">
        <?php
        for ($i=1; $i <=50 ; $i++) { 
            echo "$i " ;
        }?>
        </div>
    </div>

    <div class="loop-cont">
        <div class="loop-head">Ini Perulangan Menggunakan WHILE</div>
        <div class="loop-out">
            <?php
            $a = 1 ;
            while ($a <= 50) {
                
                echo "$a " ;
                $a++ ;
            }
            ?>
        </div>
    </div>
</body>
</html>
