<?php

$furnitures = [
    [
        'nama' => 'Rak Piring 100cm X 200cm',
        'harga' => 300000,
        'tipe' => 'rakitan'
    ],
    [
        'nama' => 'Meja Belajar Classic',
        'harga' => 150000,
        'tipe' => 'non-rakitan'
    ],
    [
        'nama' => 'Kursi Taman 2 Seater',
        'harga' => 270000,
        'tipe' => 'non-rakitan'
    ],
    [
        'nama' => 'Lemari Pajangan 5 susun',
        'harga' => 487000,
        'tipe' => 'rakitan'
    ],
    [
        'nama' => 'Meja Rias Tipe Europe',
        'harga' => 50000,
        'tipe' => 'non-rakitan'
    ],
    [
        'nama' => 'Ranjang Bayi',
        'harga' => 450000,
        'tipe' => 'rakitan'
    ]
];

foreach ($furnitures as $furniture) {
    echo "<center><table style='border:1px solid black; padding:13px; width:400px'>";
    echo "<tr>";
    echo "<td>" . $furniture['nama'] . "</td>";
    echo "<td>Rp" . number_format($furniture['harga'], 0, ',', '.') . "</td>";
    echo "<td>" . $furniture['tipe'] . "</td>";
    echo "</tr>";
    echo "</center></table>";
}
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }


        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }



        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        select,
        input[type="number"] {
            width: 25%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .space {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <table border="1">


        <h2>Pilih Furnitur Rakitan</h2>
        <form method="post" action="">
            <table>
                <label for="item">Pilih Furnitur:</label>
                <select name="item" id="item">
                <option disabled selected hidden>==============PILIH FURNITURE ANDA==============</option>
                    <?php
                    foreach ($furnitures as $furniture) {
                        if ($furniture['tipe'] === 'rakitan') {
                            echo '<option value="' . $furniture['nama'] . '">' . $furniture['nama'] . '</option>';
                        }
                    }
                    ?>
                </select>
                <br>
                <label for="jumlah">Jumlah:</label>
                <input type="number" name="jumlahR" id="jumlah" min="1">


                <h2>Pilih Furnitur Non-Rakitan</h2>

                <label for="item_non_rakitan">Pilih Furnitur:</label>
                <select name="item_non_rakitan" id="item_non_rakitan">
                <option disabled selected hidden>==============PILIH FURNITURE ANDA==============</option>
                    <?php
                    foreach ($furnitures as $furniture) {
                        if ($furniture['tipe'] === 'non-rakitan') {
                            echo '<option value="' . $furniture['nama'] . '">' . $furniture['nama'] . '</option>';
                        }
                    }
                    ?>
                </select>
                <br>
                <label for="jumlah_non_rakitan">Jumlah:</label>
                <input type="number" name="jumlah_non_rakitan" id="jumlah_non_rakitan" min="1">
                <br>
                <input type="submit" name="submit" value="Hitung Total Harga">
            </table>
        </form>

        <?php

        if (isset($_POST['submit'])) {
            $selectedItem = $_POST['item_non_rakitan'];
            $jumlah = intval($_POST['jumlah_non_rakitan']);

            $selectedItemR = $_POST['item'];
            $jumlahR = intval($_POST['jumlahR']);




            foreach ($furnitures as $furniture) {
                if ($furniture['nama'] === $selectedItem && $furniture['tipe'] === 'non-rakitan') {
                    $selectedFurniture = $furniture;

                }
                if ($furniture['nama'] === $selectedItemR && $furniture['tipe'] === 'rakitan') {

                    $selectedFurniturer = $furniture;


                }

            }

            $hargaTotal = $selectedFurniture['harga'] * $jumlah;
            $hargaTotalR = $selectedFurniturer['harga'] * $jumlahR;
            echo '<h2>Total Harga:</h2>';
            echo '<p>' . $selectedItem . ' x ' .' ( '.$jumlah.')</p>';
            echo  ' Harga NON-RAKITAN ADALAH Rp ' . number_format($hargaTotal, 2, ',', '.')."<br><br>" ;

          ;
            echo '<p>' . $selectedItemR . ' x ' .' ( '.$jumlahR.')</p>';
            echo  ' Harga NON-RAKITAN ADALAH Rp ' . number_format($hargaTotalR, 2, ',', '.')."<br><br>" ;
          
       
            echo '<p> TOTAL SEMUA BARANG YAITU  ' . number_format($p = $hargaTotalR + $hargaTotal,2,',','.');

        }
        ?>
        <script src="" async defer></script>
</body>

</html>