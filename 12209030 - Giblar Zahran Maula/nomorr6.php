<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nomor 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<title></title>
</head>
<body><center>
    <div class="card" style="width:30rem;padding:5rem;top:9rem;">
    <h3>konversi detik ke jam menit detik</h3>
    <form method="post" action="">
        <label for="detik">Detik:</label>
        <input type="number" name="detik" id="detik" required class="form-control" >
        <br>
        <button input type="submit" value="Konversi" class="btn btn-dark" style="width:100%;">hitung</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $detik = $_POST["detik"];

       
        $jam = (int)($detik / 3600);
        $detik = $detik % 3600;
        $menit = (int)($detik / 60);
        $detik = $detik % 60;

        echo "<p>Hasil konversi: $_POST[detik] detik = $jam jam, $menit menit, $detik detik</p>";
    }
    ?></div></center>
</body>
</html>