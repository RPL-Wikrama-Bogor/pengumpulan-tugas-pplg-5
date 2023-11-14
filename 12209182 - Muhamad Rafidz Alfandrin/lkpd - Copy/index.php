<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Gaji Karyawan</title>
</head>
<body>
    <h1>Input</h1>
    <form action="proses.php" method="post">
        <label for="nama">Nama Karyawan:</label>
        <input type="text" name="nama" required><br>
        <br>
        <label for="gaji_pokok">Gaji Pokok:</label>
        <input type="number" name="gaji_pokok" required><br>
        <br>
        <input type="submit" value="Hitung Gaji">
    </form>
</body>
</html>
