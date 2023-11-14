<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .card {
        padding: 10px;
        margin-top: 20px;
        margin-left: 500px;
        width: 35rem;
        height: 15rem;
        float: left;
        border: 2px solid black;

    }
</style>

<body>
    <center>
        <h1>Rental Motor</h1>
    </center>
    <form action="" method="post">
        <center>
            Nama Pelanggan :
            <input type="text" name="nama" required autocomplete="off">
            <br>
            Lama Waktu Rental (Per Hari) :
            <input type="number" name="hari" required>
            <br>
            Jenis Motor :
            <select name="jenis">
                <option disabled hidden selected>---Pilih Motor---</option>
                <option value="Skuter">Skuter</option>
                <option value="Dual-Sport">Dual-Sport</option>
                <option value="Sportbike">Sportbike</option>
            </select>
            <br>
            <input type="submit" value="Submit" name="kirim">
        </center>
    </form>
</body>

</html>

<?php


if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $hari = $_POST['hari'];
    $jenis = $_POST['jenis'];

        if ($jenis == "Skuter") {
            $harga = 75000;
        } elseif ($jenis == "Dual-Sport") {
            $harga = 80000;
        } elseif ($jenis == "Sportbike") {
            $harga = 100000;
        } else {
            $harga = 0;
            echo "Pilih jenis motornya dengan benar !!! ";
        }
        $rental = new rental($nama, $hari, $jenis, $harga); 
        $rental->hasil();
    }

    class rental {
    
            public $nama, $hari, $jenis, $harga;
    
            private $listMember = ['ana', 'sam', 'alex', 'ara'];
            
                public function __construct($nama, $hari, $jenis, $harga) { 
                    $this->nama = $nama;
                    $this->hari = $hari;
                    $this->jenis = $jenis;
                    $this->harga = $harga; 
                }
    
            public function diskon() {
                return 0.05;
            }

            public function pajak(){
                return 10000;
            }
    
            public function hasil() {
                if (in_array($this->nama, $this->listMember)) {
                    $diskon = $this->diskon();
                    $harga = $this->harga * $this->hari; 
                    $hargaD = $harga * $diskon;
                    $akhir = $harga - $hargaD + $this->pajak();
                    ?>
                    <div class="card"><h2>
                        <?php
                    echo "$this->nama  berstatus sebagai Member mendapatkan diskon sebesar 5%";
                    echo "<br> Jenis motor yang dirental adalah $this->jenis selama $this->hari hari";
                    echo "<br> Harga rental perharinya : Rp." . number_format($this->harga,2,",",".");
                    echo "<br><br>";
                    echo "Besar yang harus dibayarkan adalah Rp.". number_format($akhir,2,",",".");
                    return $akhir;
                    ?>
                    </h2></div>
                    <?php
                } else {
                    ?>
                    <div class="card"><h2>
                        <?php
                    $harga = ($this->harga * $this->hari) + $this->pajak();
                    echo "$this->nama tidak terdaftar dalam list member.";
                    echo "<br> Jenis motor yang dirental adalah $this->jenis selama $this->hari hari";
                    echo "<br> Harga rental perharinya: ".number_format($this->harga,2,",",".");
                    echo "<br><br>";
                    echo "Besar yang harus di bayarkan adalah Rp." . number_format($harga,2,",",".");
                    return $harga;
                    ?>
                    </h2></div>
                    <?php
                }
            }
        }
    ?>
    
    
