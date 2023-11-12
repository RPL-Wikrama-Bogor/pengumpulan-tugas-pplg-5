<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #00f;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            padding: 20px;
            width: 400px;
            max-width: 90%;
            box-sizing: border-box;
        }

        h2 {
            color: #00f;
            margin-bottom: 10px;
        }

        h3 {
            color: #00f;
            margin-bottom: 10px;
        }

        form {
            margin-top: 20px;
        }

        input[type="number"] {
            padding: 5px;
            margin: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #00f;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #005;
        }

        p {
            margin: 10px 0;
        }
    </style>

        <body>
            <div class="card">
            <form action="" method="post">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $siswa = array();
                    for ($i = 1; $i <= 15; $i++) {
                        echo "<h3>Siswa ke-$i</h3>";
                        $nilaiTotal = 0;
                        for ($j = 1; $j <= 5; $j++) {
                            $mataPelajaran = ['MTK', 'INDO', 'INGG', 'DPK', 'Agama'][$j - 1];
                            echo "$mataPelajaran: <input type='number' name='nilai[$i][$j]' required><br>";
                        }
                        echo "Kehadiran : <input type='number' name='kehadiran[$i]' min='0' max='100' required><br>";
                    }
                    echo "<br><input type='submit' value='Cari'>";
                } else {
                    echo "<p> isi nilai dan kehadiran siswa:</p>";
                    echo "<form method='post' action=''>";
                    echo "<input type='submit' value='Mulai'>";
                }
                ?>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nilai']) && isset($_POST['kehadiran'])) {
                    $siswa = $_POST['nilai'];
                    $kehadiran = $_POST['kehadiran'];

                    $juara = array();
                    foreach ($siswa as $index => $dataSiswa) {
                        $nilaiTotal = array_sum($dataSiswa);
                        if ($nilaiTotal >= 475 && $kehadiran[$index] == 100) {
                            $juara[] = "Siswa ke-$index";
                        }
                    }

                    if (count($juara) > 0) {
                        echo "<h2>Siswa yang mendapat juara kelas adalah :</h2>";
                        foreach ($juara as $namaSiswa) {
                            echo "<p>$namaSiswa</p>";
                        }
                    } else {
                        echo "<h2>Tidak ada siswa yang juara.</h2>";
                    }
                }
                ?>
            </form>
            </div>
        </body>

        </html>