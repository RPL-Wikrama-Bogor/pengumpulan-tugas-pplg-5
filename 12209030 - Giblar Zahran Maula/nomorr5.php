<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nomor 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body><center>
    <div class="card" style="width:23rem; padding:4rem;top:9rem ;">
<form method="post" action="">
        <label for="jam">Jam:</label>
        <input type="number" name="jam" id="jam" required class="form-control">
        <br>
        <label for="menit">Menit:</label>
        <input type="number" name="menit" id="menit" required class="form-control">
        <br>
        <label for="detik">Detik:</label>
        <input type="number" name="detik" id="detik" required class="form-control">
        <br>
        <button type="submit" value="Konversi" class="btn btn-dark" style="width:100%;">hitung</button>
    </form>
</div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jam = $_POST["jam"];
        $menit = $_POST["menit"];
        $detik = $_POST["detik"];

        $total_detik = ($jam * 3600) + ($menit * 60) + $detik;

        echo "<p>Hasil konversi: $jam jam, $menit menit, $detik detik = $total_detik detik</p>";
    }
    ?></center>
</body>
</html>