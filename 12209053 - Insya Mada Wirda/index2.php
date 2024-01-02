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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture</title>
    <style>
        .button {
            width: 20rem;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .daftarharga {
            outline: auto;
            width: 620px;
            padding: 8px 16px;
            max-width: 900px;
            margin: 0 auto;
        }

        .submit {
            outline: auto;
            width: 620px;
            padding: 8px 16px;
            max-width: 900px;
            margin: 0 auto;
        }

        .card {
            
            outline: auto;
            padding: 8px 16px;
            margin-bottom: 8px;
        }
        

        .text-center {
            text-align: center;
        }

        .table {
            width: 100%;
            padding: 8px 16px;
        }

        .form-select {
            width: 100%;
        }

        .form-input {
            width: 50%;
        }
    </style>
</head>

<body>
    <section class="daftarharga">
        <h3 style="text-align:center;">Daftar Furniture I'dea </h3>
        <ol>
            <?php foreach ($furnitures as $furniture) { ?>
                <li>Nama Furnitures : <?php echo $furniture["nama"] ?>
                    Harga : <?php echo $furniture["harga"] ?></li>
            <?php } ?>
        </ol>
    </section>
    <br>
    <section class="submit">
        <form action="" method="post">
            <table>
                <tr>
                    <td>Pilih Furniture Rakitan : </td>
                    <td>
                        <select name="rakitan" id="">
                            <option hidden>---Pilih---</option>
                            <?php
                                foreach ($furnitures as $key => $item) {
                                    if ($item['tipe'] == 'rakitan') {
                                        echo '<option value="' . $key . '">' . $item['nama'] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jumlah Pembelian Furniture Rakitan : </td>
                    <td><input type="number" name="jmlhrakitan"></td>
                </tr>
                <tr>
                    <td>Pilih Furniture Tidak Rakitan : </td>
                    <td><select name="non-rakitan" id="">
                            <option hidden>---Pilih---</option>
                            <?php
                                foreach ($furnitures as $key => $item) {
                                    if ($item['tipe'] == 'non-rakitan') {
                                        echo '<option value="' . $key . '">' . $item['nama'] . '</option>';
                                    }
                                }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Jumlah Pembelian Furniture Tidak Rakitan : </td>
                    <td><input type="number" name="jmlhtdkrakitan"></td>
                </tr>
                <tr>
                    <td><input class="button" type="submit" name="submit" value="Beli"></td>
                </tr>
            </table>

            <?php 
                if (isset($_POST['submit'])) {
                    $rakitan = $_POST['rakitan'];
                    $jumlahrakitan = $_POST['jmlhrakitan'];
                    $nonrakitan = $_POST['non-rakitan'];
                    $tidakrakitan = $_POST['jmlhtdkrakitan'];

                    $total_harga = ($furnitures[$rakitan]['harga'] * $jumlahrakitan) + ($furnitures[$nonrakitan]['harga'] * $tidakrakitan);

                    //rakitan
                    $barang_rakit = ($furnitures[$rakitan]['nama']);
                    $harga_rakit = ($furnitures[$rakitan]['harga']) * $jumlahrakitan;

                    //nonrakit
                    $barang_non = ($furnitures[$nonrakitan]['nama']);
                    $harga_non = ($furnitures[$nonrakitan]['harga']) * $tidakrakitan; ?>

                    <section class="card">
                    <?php
                    echo "<h3 style= 'text-align : center;'>Bukti Pembelian</h3>";
                    echo "Furnitures Rakitan: " . $barang_rakit . " (" . $jumlahrakitan . ")" . "<br>";
                    echo "Harga Furnitures Rakitan: " . number_format($harga_rakit, 0, ',', '.')  . "<br>";
                    echo "Furniture Non Rakitan : " . $barang_non . " (" . $tidakrakitan . ")" . "<br>";
                    echo "Harga Furnitures Non Rakitan: " . number_format($harga_non, 0, ',', '.') . "<br>";
                    echo "Total Pembayaran: Rp " . number_format($total_harga, 0, ',', '.');
                    // number_format(sumber_data, jumlah_angka_nol_dibelakang_koma, buat_ngasih_koma_diakhir_angka, buat_ngasih_titik_diantara_angka);
                    echo "<br> CONTOH " . number_format(10000, 2, 'buat_ngasih_koma_diakhir_angka', 'buat_ngasih_titik_diantara_angka')  . "<br>";
                }
            ?>
                </section>
</body>
</html>