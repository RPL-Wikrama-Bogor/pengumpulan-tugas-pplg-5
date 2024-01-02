<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data waktu tambah 1 detik</title>
</head>

<body>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        output {
            font-weight: bold;
            font-size: 18px;
            margin-top: 10px;
        }
    </style>

    <form method="POST" action="">
        <table>
        <tr>
            <td>Input Jam</td>
            <td><input type="number" name="hh"></td>
        </tr>
        <tr>
            <td>Input Menit</td>
            <td><input type="number" name="mm"></td>
        </tr>
        <tr>
            <td>Input detik</td>
            <td><input type="number" name="ss"></td>
        </tr>
            <td><input type="submit" value="Submit" name="submit"></td>
            </table>

            <?php
            if (isset($_POST['submit'])) {
                $hh = $_POST['hh'];
                $mm = $_POST['mm'];
                $ss = $_POST['ss'];

                $ss = $ss + 1;

                if ($ss >= 60) {
                    $mm = $mm + 1;
                    $ss = 00;

                    if ($mm >= 60) {
                        $hh = $hh + 1;
                        $mm = 00;
                        $ss = 00;

                        if ($hh >= 24) {
                            $hh = 00;
                            $mm = 00;
                            $ss = 00;
                        }
                    }
                } else {
                    $ss = $ss;
                }

                echo $hh . ":";
                echo $mm . ":";
                echo $ss ;
            }

            ?>

</body>

</html>