<!DOCTYPE html>
<html>
<head>
    <title>Nomer 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 40rem;
            padding: 20px;
            text-align: center;
        }
        
        .submit-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <center>
    <div class="card" style="width: 40rem;">
      <?php
    $nama = "";
    $gaji_pokok = "";
    $tunj = 0;
    $pjk = 0;
    $gaji_bersih = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $nama = $_POST["nama"];
        $gaji_pokok = $_POST["gaji_pokok"];
        
        
        $tunj = 0.2 * $gaji_pokok;
        $pjk = 0.15 * ($gaji_pokok + $tunj);

       
        $gaji_bersih = $gaji_pokok + $tunj - $pjk;
    }
    ?>

    <form action="" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required><br><br>

        <label for="gaji_pokok">Gaji Pokok:</label>
        <input type="number" id="gaji_pokok" name="gaji_pokok" value="<?php echo $gaji_pokok; ?>" required><br><br>

        <button  type="submit" value="Submit" class="submit-btn">submit</button>

    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h2>Hasil Perhitungan Gaji</h2>
        <p>Nama Karyawan: <?php echo $nama; ?></p>
        <p>Tunjangan: <?php echo $tunj; ?></p>
        <p>Pajak: <?php echo $pjk; ?></p>
        <p>Gaji Bersih: <?php echo $gaji_bersih; ?></p>
        <?php endif; ?>
        </div>
</div>
    </center>
</body>
</html>
