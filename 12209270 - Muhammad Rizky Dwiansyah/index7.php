<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Harga Buah Jeruk</title>
</head>
<body>
    <h1>Kalkulator Harga Buah Jeruk</h1>
    
    <form method="post" action="">
        <label for="berat">Berat (gram):</label>
        <input type="number" id="berat" name="berat" min="0"><br>
        
        <input type="submit" name="hitung" value="Hitung">
    </form>
     
    <title>Contoh CSS Animasi Warna Teks</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            text-align: center;
            animation: changeColor 5s linear infinite; /* Animasi perubahan warna */
        }   
        }

        h1 {
            padding: 20px;
            animation: changeColor 5s linear infinite; /* Animasi perubahan warna */
        }

        @keyframes changeColor {
            0% {
             background-color: #3498db; /* Warna awal (biru) */
            }
            50% {
             background-color: #e74c3c; /* Warna tengah (merah) */
            }
            100% {
            background-color: #27ae60; /* Warna akhir (hijau) */
            }
        }
    


    </style>
</head>
<body>
    <h1>~~~~~~~~~~~~~~~~~~~~~~~~~.</h1>
    <p>~~~~~~~~~~~~~~~~~~~~~~~~~~.</p>
</body>
</html>








    <?php
    if (isset($_POST['hitung'])) {
        $berat = $_POST['berat'];

        $harga_per_100g = 500; // Harga per 100 gram (500 rupiah)
        $harga_per_kg = $harga_per_100g * 10; // Harga per kg (5000 rupiah)

        $total_harga_sebelum_diskon = ($berat / 1000) * $harga_per_kg;
        $diskon = 0.05 * $total_harga_sebelum_diskon;
        $total_harga_setelah_diskon = $total_harga_sebelum_diskon - $diskon;

        echo "<h2>Hasil Perhitungan</h2>";
        echo "Berat: " . $berat . " gram<br>";
        echo "Total Harga Sebelum Diskon: " . $total_harga_sebelum_diskon . " rupiah<br>";
        echo "Diskon: " . $diskon . " rupiah<br>";
        echo "Total Harga Setelah Diskon: " . $total_harga_setelah_diskon . " rupiah<br>";
        
    }
    ?>
</body>
</html>

