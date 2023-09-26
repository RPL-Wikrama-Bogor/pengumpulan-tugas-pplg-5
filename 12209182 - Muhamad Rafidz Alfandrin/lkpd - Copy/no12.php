<!DOCTYPE html>
<html>
<head>
    <title>Data waktu</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #9ACD32;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
    padding: 20px;
}

h1 {
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="number"] {
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 14px;
}

input[type="submit"] {
    background-color: #FFFF00;
    color: black;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
}
 </style>
</head>
<body>
    <center>
    <h1>Data waktu</h1>
    <form action="" method="post">
        <label for="jam">Jam</label>
        <input type="number" name="jam" required><br>
        <br>
        <label for="menit">Menit</label>
        <input type="number" name="menit" required><br>
        <br>
        <label for="detik">Detik</label>
        <input type="number" name="detik" required><br>
        <br>
        <input type="submit" value="Input">
    </form>
</body>
</html>
  
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jam = $_POST["jam"];
    $menit = $_POST["menit"];
    $detik = $_POST["detik"];

    $detik = $detik + 1;

    if ($detik >= 60) {
        $menit = $menit + 1;
        $detik = 00;
    }
    if ($menit >= 60) {
        $jam = $jam + 1;
        $menit = 00;
        $detik = 00;
    }
    if ($jam >= 24) {
        $jam = 00;
        $detik = 00;
    }

    echo $jam . " : " . $menit . " : " . $detik;
}
?>