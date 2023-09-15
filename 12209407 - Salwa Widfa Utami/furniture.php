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
        <title>Furnitures</title>
        <style>
            .daftar{  
            outline: auto;
            width: 620px;
            padding: 8px 16px;
            margin: 1rem 20rem;
            background-color: #FFD9B7;
        }
            .input{
            outline: auto;
            width: 620px;
            padding: 18px 16px;
            margin: 1rem 20rem;
            background-color: #FFD9B7;
            }
            .hasil{
            outline: auto;
            width: 620px;
            padding: 16px 18px;
            margin: 1rem 20rem;
            background-color: #FFD9B7;
            }
            button{
                width: 100%;
            }
        </style>
    </head>
    <body>
            
        <section class="daftar">
        <h3> <center> Daftar Furniture I'dea </h3>
        <ol>
            <?php foreach ($furnitures as $furniture ) { ?>
            <li>Nama Furnitures : <?php echo $furniture["nama"] ?> <br>
            Harga : <?php echo $furniture["harga"] ?></li>
            <?php } ?>
        </ol>
        </section>
        
        <section class="input">
        <form action="" method="post">
        <!-- Rakitan -->
        <label for="">Pilih Furniture Rakitan: </label>
        <select name="rakitan" id="">
            <option disabled hidden selected> ---Pilih--- </option>
            <?php
                foreach ($furnitures as $key => $item) {
                    if ($item['tipe'] == 'rakitan') {
                        echo '<option value="' . $key . '">' . $item['nama'] . '</option>';
                    }
                }
            ?>
        </select><br><br>
        <label for="">Jumlah Pembelian Furniture Rakitan: </label><input type="number" name="jmlhrakitan"><br><br>

        <!-- Non-Rakitan -->
        <label for="">Pilih Furniture Non-Rakitan: </label>
        <select name="non-rakitan" id="">
            <option disabled hidden selected> ---Pilih--- </option>
            <?php
                foreach ($furnitures as $key => $item) {
                    if ($item['tipe'] == 'non-rakitan') {
                        echo '<option value="' . $key . '">' . $item['nama'] . '</option>';
                    }
                }
            ?>
        </select><br><br>
        <label for="">Jumlah Pembelian Furniture Non-Rakitan: </label><input type="number" name="jmlhtdkrakitan"><br><br>
        <button type="submit" name="submit">Beli </button>
        </section>

        <?php if (isset($_POST['submit'])) {
            $rakitan = $_POST['rakitan'];
            $jmlhrakitan = $_POST['jmlhrakitan'];
            $nonrakit = $_POST['non-rakitan'];
            $tdkrakitan = $_POST['jmlhtdkrakitan'];
            
            //rakitan
            $barang_rakit = ($furnitures[$rakitan]['nama']) ;
            $harga_rakit = ($furnitures[$rakitan]['harga']) * $jmlhrakitan ;
            
            //non-rakitan
            $barang_non = ($furnitures[$nonrakit]['nama']) ;
            $harga_non = ($furnitures[$nonrakit]['harga']) * $tdkrakitan ; 

            $total_harga = ($furnitures[$rakitan]['harga'] * $jmlhrakitan) + ($furnitures[$nonrakit]['harga'] * $tdkrakitan);?>
            <section class="hasil">
        <?php
        echo "<h3 style= 'text-align : center;'>Bukti Pembelian</h3>" ;
        echo "Furnitures Rakitan: " .$barang_rakit ." (". $jmlhrakitan .")"."<br>" ;
        echo "Harga Furnitures Rakitan: Rp. ". number_format($harga_rakit, 0, ',', '.')  ."<br>" ;
        echo "Furniture Non Rakitan : " .$barang_non ." (". $tdkrakitan .")"."<br>";
        echo "Harga Furnitures Non Rakitan : Rp. ". number_format($harga_non, 0, ',', '.') ."<br>" ;
        echo "Total Pembayaran: Rp. ". number_format($total_harga, 0, ',', '.') ;
        }
        ?>
    </section>
</body>
</html>