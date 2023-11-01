<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nomor 5</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<style>
    .card{
        display: inline-block; 
    }
</style>
<body>
    
<h1>Angka Ganjil dan Genap dari 1 sampai 50</h1>
<div class="card" style="width:30rem;">
<h2>Angka Genap:</h2>
<ul>
    <?php
    for ($i = 2; $i <= 50; $i += 2) {
        echo "<li>$i</li>";
    }
    ?>
</ul>
</div>
<div class="card" style="width:30rem;">
<h2>Angka Ganjil:</h2>
<ul>
    <?php
    for ($i = 1; $i <= 50; $i += 2) {
        echo "<li>$i</li>";
    }
    ?>
    </div>
</body>
</html>