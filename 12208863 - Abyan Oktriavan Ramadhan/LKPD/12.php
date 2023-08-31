<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LKPD 12</title>
    <style>
        body {
            background-color: #FFF3DA;
            color: black;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ADC4CE;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label, input {
            margin-bottom: 10px;
        }

        input[type="number"] {
            width: 50px;
            padding: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #252B48;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .container p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h1>Tambah 1 detik secara otomatis :D</h1>
            <label for="hh">Input HH</label>
            <input type="number" name="hh" id="hh">
            <label for="mm">Input MM</label>
            <input type="number" name="mm" id="mm">
            <label for="ss">Input SS</label>
            <input type="number" name="ss" id="ss">
            <input type="submit" name="submit">
        </form>

            <?php
            if(isset($_POST['submit'])){
                $ss = $_POST['ss'];
                $mm = $_POST['mm'];
                $hh = $_POST['hh'];
                $ss = $ss + 1;
    
                if($ss >= 60){
                    $mm = $mm + 1;
                    $ss = 0;
                }
                if($mm >= 60){
                    $hh = $hh + 1;
                    $mm = 00;
                    $ss = 00;
                }
                if($hh >= 24){
                    $hh = 00;
                    $mm = 00;
                    $ss = 00;
                }
    
                echo  '<p>' .'Result : ' .'<br>'. $hh . " jam " . $mm . " menit " . $ss . " detik" . '</p>';
            } 
            ?>
    </div>
</body>
</html>