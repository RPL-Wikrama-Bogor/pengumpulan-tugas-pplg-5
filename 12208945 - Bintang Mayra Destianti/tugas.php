<?php
    $furnituree = [
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
            .daftarharga {  
            outline: auto;
            width: 620px;
            padding: 8px 16px;
            background-color:#EFB495;
            max-width: 900px;
              margin: 0 auto;
        }
            .submit{
                outline: auto;
            width: 620px;
            padding: 8px 16px;
            background-color:#EFB495;
            max-width: 900px;
              margin: 0 auto;
            }
            .card{
                outline: auto;
            width: 620px;
            padding: 8px 16px;
            background-color:#EFB495;
            max-width: 900px;
              margin: 0 auto;
            
            }
            
            button{
                width:200%;
            }
        
        </style>
    </head>
    <body>

        <section class="daftarharga">
        <h3> <center> Daftar Furniture I'dea</center> </h3>
        <ol>
            <?php foreach ($furnituree as $furniture ) { ?>
            <li>Nama Furnitures : <?php echo $furniture["nama"] ?> <br>
            Harga : <?php echo $furniture["harga"] ?></li>
            <?php } ?>
        </ol>
        </section>
        <br>
        <section class="submit">
        <form action="" method="post">
        <table >
            <tr>
                <td>Pilih Furniture Rakitan : </td>
                <td><select name="rakitan" id="">
                <option hidden select>---Pilih---</option>
                <?php
                foreach ($furnituree as $key => $item) {
                    if ($item['tipe'] == 'rakitan') {
                        echo '<option value="' . $key . '">' . $item['nama'] . '</option>';
                    }
                }
                ?>
                </select></td>
            </tr>

            <tr>
                <td>Jumlah Pembelian Furniture Rakitan  : </td>
                <td><input type="number" name="jmlhrakitan"></td>
            </tr>

            <tr>
                <td>Pilih Furniture Tidak Rakitan : </td>
                <td><select name="non-rakitan" id="">
                <option hidden select>---Pilih---</option>
                <?php
                foreach ($furnituree as $key => $item) {
                    if ($item['tipe'] == 'non-rakitan') {
                        echo '<option value="' . $key . '">' . $item['nama'] . '</option>';
                    }
                }
                ?>
                </select></td>
            </tr>

            <tr>
                <td>Jumlah Pembelian Furniture Tidak Rakitan  : </td>
                <td><input type="number" name="jmlhtdkrakitan"></td>
            </tr>

            <tr>
                <td><button type="submit" name="submit">Beli</button></td>
            </tr>
        </table>
            </section>
            
        <?php if (isset($_POST['submit'])) {
        $rakitan = $_POST['rakitan'];
        $jumlahrakitan = $_POST['jmlhrakitan'];
        $nonrakitan = $_POST['non-rakitan'];
        $tidakrakitan= $_POST['jmlhtdkrakitan'];

        $total_harga = ($furnituree[$rakitan]['harga'] * $jumlahrakitan) + ($furnituree[$nonrakitan]['harga'] * $tidakrakitan);
        //rakitan
        $barang_rakit = ($furnituree[$rakitan]['nama']) ;
        $harga_rakit = ($furnituree[$rakitan]['harga']) * $jumlahrakitan ;

        //nonrakit
        $barang_non = ($furnituree[$nonrakitan]['nama']) ;
        $harga_non = ($furnituree[$nonrakitan]['harga']) * $tidakrakitan ; ?>
       <br>
       <section class="card">
        <?php
        echo "<h3 style= 'text-align : center;'>Bukti Pembelian</h3>" ;
        echo "Furnitures Rakitan: " .$barang_rakit ." (". $jumlahrakitan .")"."<br>" ;
        echo "Harga Furnitures Rakitan: Rp.". number_format($harga_rakit, 2, ',', '.')  ."<br>" ;
        echo "Furniture Non Rakitan : " .$barang_non ." (". $tidakrakitan.")"."<br>";
        echo "Harga Furnitures Non Rakitan:Rp .". number_format($harga_non, 2, ',', '.') ."<br>" ;
        echo "Total Pembayaran: Rp. ". number_format($total_harga, 2, ',', '.') ;

    }
?>

</div>
</section>
</body>
</html>