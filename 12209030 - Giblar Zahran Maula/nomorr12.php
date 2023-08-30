<!DOCTYPE html>
<html>
<head>
    <title>Menambah 1 Detik ke Waktu</title>
    <style type="text/css">
        body{
             font-family: 'Roboto', sans-serif;
        }
        input {
            width: 2rem;
        }

        .card {
            border: none;
            width: 20rem;
            height: 30rem;
            padding: 5rem;
            border-radius: 20px;
        }

        input {
            margin-top: 1rem;
            margin-bottom: 2rem;
            height: 3rem;
            border-radius: 5px;
            padding-left: 10px;
            background-color: #D2D2D2;
            outline: none;
            border: none;
            font-size: 20px;
        }

        button {
            width: 50%;
            height: 3rem;
            border: none;
            background-color: #000;
            color: white;
            border-radius: 10px;
        }

        

        
        .result {
            background-color: #D2D2D2;             
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <center>
        
        <div class="card">
            <h1>Menambah 1 Detik ke Waktu</h1>
            <form method="post" action="">
               
                <input type="text" id="jam" name="jam" required>

                <label for="menit">:</label>
                <input type="text" id="menit" name="menit" required>

                <label for="detik">:</label>
                <input type="text" id="detik" name="detik" required>

                <br><button type="submit" value="Tambah 1 Detik">+1</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $jam_input = $_POST["jam"];
                $menit_input = $_POST["menit"];
                $detik_input = $_POST["detik"];

               
                if (preg_match("/^([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/", "$jam_input:$menit_input:$detik_input")) {
                    // Konversi waktu ke detik
                    $total_detik = ($jam_input * 3600) + ($menit_input * 60) + $detik_input;

                   
                    $total_detik += 1;

                   
                    $jam = floor($total_detik / 3600);
                    $total_detik %= 3600;
                    $menit = floor($total_detik / 60);
                    $detik = $total_detik % 60;

                    
                    echo "<div class='result'> $jam</div>";
                    echo "<span> : </span>";
                    echo "<div class='result'> $menit</div>";
                     echo "<span> : </span>";
                    echo "<div class='result'>$detik</div>";
                } else {
                    echo "<p style='color: red;'>Format waktu tidak valid. Gunakan format hh:mm:ss.</p>";
                }
            }
            ?>
        </div>
    </center>
</body>
</html>
