<style>
     @font-face {
        font-family: cobain;
        src: url(OpenSans-VariableFont_wdth\,wght.ttf);
    }
    *{
        font-family: 'cobain';
    }
    .card , .card3 , form{
        border: none;
        padding: 15px;
        width: 500px;
        background-color: #EEE0C9;
        text-align: left;
        margin: 2rem 27.6rem;
        border-radius: 5px;
    }
   
    button{
        margin-top: 2rem;
        margin-left: 13rem;
        width: 5rem;
        height: 1.5rem;
    }
</style>
<body>
<?php
    $furniture = [
        [
            'nama'  => 'Rak Piring 100cm x 200cm',
            'harga' =>  300000 ,
            'tipe'  => 'rakitan'
        ],
        [
            'nama'  => 'Meja Belajar',
            'harga' =>  150000 ,
            'tipe'  => 'non-rakitan'
        ],
        [
            'nama'  => 'Kursi Taman 2 Seater',
            'harga' =>  270000 ,
            'tipe'  => 'non-rakitan'
        ],
        [
            'nama'  => 'Lemari Panjang 5 Susun',
            'harga' =>  487000 ,
            'tipe'  => 'rakitan'
        ],
        [
            'nama'  => 'Meja Rias Tipe Europe',
            'harga' =>  50000 ,
            'tipe'  => 'non-rakitan'
        ],
        [
            'nama'  => 'Ranjang Bayi',
            'harga' =>  450000 ,
            'tipe'  => 'rakitan'
        ]
    ] ;

$no = 1 ;
?><div class="card"><?php
echo  "<h2 style= 'text-align:center;'>Daftar Furniture I'dea</h2>" ;

foreach ($furniture as $data) {
        echo $no. ". Nama Furniture: ". $data['nama'] . "<br>" ."ㅤ". " Harga: " . $data['harga']. "<br>";        
        $no ++ ;
    }
?></div><?php
?>
</body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <!-- Rakitan -->
        <label for="">Pilih Furniture Rakitan: </label>
        <select name="rakitan" id="">
            <option disabled hidden selected> pilih </option>
            <?php
                foreach ($furniture as $key => $item) {
                    if ($item['tipe'] == 'rakitan') {
                        echo '<option value="' . $key . '">' . $item['nama'] . '</option>';
                    }  
                }
            ?>
        </select><br><br>
        <label for="">Jumlah Pembelian Furniture Rakitan: </label><input type="number" name="jml_rakit"><br><br>

        <!-- Non-Rakitan -->
        <label for="">Pilih Furniture Non-Rakitan: </label>
        <select name="nonrak" id="">
            <option disabled hidden selected> pilih </option>
            <?php
                foreach ($furniture as $key => $item) {
                    if ($item['tipe'] == 'non-rakitan') {
                        echo '<option value="' . $key . '">' . $item['nama'] . '</option>';
                    }
                }
            ?>
        </select><br><br>
        <label for="">Jumlah Pembelian Furniture Non-Rakitan: </label><input type="number" name="jml_nonrak"><br>
        <button type="submit" name="Beli">Beli </button>
</form>
<?php if (isset($_POST['Beli'])) {
        $rak_index = $_POST['rakitan'];
        $rak_jml = $_POST['jml_rakit'];
        $non_index = $_POST['nonrak'];
        $non_jml = $_POST['jml_nonrak'];

        $total_harga = ($furniture[$rak_index]['harga'] * $rak_jml) + ($furniture[$non_index]['harga'] * $non_jml);
        
        //rakitan
        $barang_rakit = ($furniture[$rak_index]['nama']) ;
        $harga_rakit = ($furniture[$rak_index]['harga']) * $rak_jml ;

        //nonrakit
        $barang_non = ($furniture[$non_index]['nama']) ;
        $harga_non = ($furniture[$non_index]['harga']) * $non_jml ; ?>

        <div class="card3">
        <?php
        echo "<h3 style= 'text-align : center;'>Bukti Pembelian</h3>" ;
        echo "Furniture Rakitan: " .$barang_rakit ." (". $rak_jml .")"."<br>" ;
        echo "Harga Furniture Rakitan: ". number_format($harga_rakit, 0, ',', '.')  ."<br>" ;
        echo "Furniture Non Rakitan : " .$barang_non ." (". $non_jml .")"."<br>";
        echo "Harga Furniture Non Rakitan: ". number_format($harga_non, 0, ',', '.') ."<br>" ;
        echo "Total Pembayaran: Rp ". number_format($total_harga, 0, ',', '.') ;
    }
?>
</div>
</body>
</html>
