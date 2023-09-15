<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        min-height: 3000px;
    }

    .form {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        padding: 20px;
        width: 500px;
        height: 350px;
    }

    h2 {
        margin-top: 0;
        font-size: 24px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
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

    .hasil p {
        font-family: 'Lato', sans-serif;
        font-family: 'Poppins', sans-serif;    
        cursor: pointer;
        margin-right: 2rem;
    }
    
</style>

<body>
    
    <div class="form">
        <h2>Hitung Gaji Karyawan</h2>
        <!-- input  -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="nama">Nama Karyawan:</label><br>
            <input type="text" id="nama" name="nama" required autofocus><br><br>
            
            <label for="gaji">Gaji Pokok:</label><br>
            <input type="number" id="gaji" name="gaji" required><br><br>
            
            <input type="submit" value="Hitung Gaji">
            

     <div class="hasil"> 
<?php
// memeriksa apakah permintaan adalah permintaan POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nama']) && isset($_POST['gaji'])) {
    $nama = $_POST['nama'];
    $gaji_pokok = $_POST['gaji'];

    $tunj = 0.2 * $gaji_pokok;
    $pjk = 0.15 * ($gaji_pokok + $tunj);
    $gaji_bersih = $gaji_pokok + $tunj - $pjk;

    echo "<p>Nama Karyawan: " . $nama . "</p>";
    echo "<p>Tunjangan: " . $tunj . "</p>";
    echo "<p>Pajak: " . $pjk . "</p>";
    echo "<p>Gaji Bersih: " . $gaji_bersih . "</p>";
}
?>
        </form>
    </div>      
        </div>

</body>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

</html>



