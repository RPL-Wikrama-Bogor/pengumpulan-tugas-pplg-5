<!DOCTYPE html>
<html>
<head>
    <title>Form Penentuan Juara Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            background: #525252; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin: 0;
        }
        .card {
            width: 40rem;
        }
    </style>
</head>
<body>
<div class="card">
  <div class="card-body">
    <h1>Form Penentuan Juara Kelas</h1>
    <form action="" method="post">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $jumlahSiswa = 15;
            $nilaiSiswa = array();

            for ($i = 1; $i <= $jumlahSiswa; $i++) {
                echo "<h3>Siswa Ke-$i</h3>";
                echo "<label for='nama$i'>Nama Siswa:</label>";
                echo "<input type='text' id='nama$i' name='nama$i' required><br>";

                echo "<label for='nilaiMtk$i'>Nilai Matematika:</label>";
                echo "<input type='number' id='nilaiMtk$i' name='nilaiMtk$i' required><br>";

                echo "<label for='nilaiIndo$i'>Nilai Bahasa Indonesia:</label>";
                echo "<input type='number' id='nilaiIndo$i' name='nilaiIndo$i' required><br>";

                echo "<label for='nilaiInggris$i'>Nilai Bahasa Inggris:</label>";
                echo "<input type='number' id='nilaiInggris$i' name='nilaiInggris$i' required><br>";

                echo "<label for='nilaiDpk$i'>Nilai DPK:</label>";
                echo "<input type='number' id='nilaiDpk$i' name='nilaiDpk$i' required><br>";

                echo "<label for='nilaiAgama$i'>Nilai Agama:</label>";
                echo "<input type='number' id='nilaiAgama$i' name='nilaiAgama$i' required><br><br>";
            }

            echo "<input type='submit' value='Hitung Juara Kelas'>";
            
            for ($i = 1; $i <= $jumlahSiswa; $i++) {
                if (isset($_POST["nilaiMtk$i"]) && isset($_POST["nilaiIndo$i"]) && isset($_POST["nilaiInggris$i"]) && isset($_POST["nilaiDpk$i"]) && isset($_POST["nilaiAgama$i"])) {
                    $nilaiMtk = $_POST["nilaiMtk$i"];
                    $nilaiIndo = $_POST["nilaiIndo$i"];
                    $nilaiInggris = $_POST["nilaiInggris$i"];
                    $nilaiDpk = $_POST["nilaiDpk$i"];
                    $nilaiAgama = $_POST["nilaiAgama$i"];

                    // Hitung rata-rata nilai atau total nilai
                    $nilaiRata = ($nilaiMtk + $nilaiIndo + $nilaiInggris + $nilaiDpk + $nilaiAgama) / 5;

                    $nilaiSiswa[$i] = $nilaiRata;
                }
            }

            // Cari siswa dengan nilai tertinggi (juara kelas)
            $juaraIndex = array_search(max($nilaiSiswa), $nilaiSiswa);

            echo "<h2>Juara Kelas:</h2>";
            echo "Siswa Ke-$juaraIndex dengan nilai rata-rata tertinggi.";
        }
        ?>
    </form>
    </div>
</div>
</body>
</html>
