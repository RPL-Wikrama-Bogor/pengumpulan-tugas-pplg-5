<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Kendaraan</title>
    <style>
        .card{
            width: 24rem;
            height: 8rem;
            border-style : solid;
            border-width: 1px;
            padding: 1.5rem 1rem 0rem 1rem;
            margin: 2rem  ;
        }
    </style>
</head>
<body>
    <center>
        <h2>Rental Kendaraan Roda 2</h2>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Nama Pelanggan</td>
                    <td>:</td>
                    <td><input type="text" name="nama" required></td>
                </tr>
                <tr>
                    <td>Lama Waktu Rental (Per hari)</td>
                    <td>:</td>
                    <td><input type="number" name="waktu"></td>
                </tr>
                <tr>
                    <td>Jenis Kendaraan</td>
                    <td>:</td>
                    <td>
                        <select name="jenis">
                            <option value="motor">Motor</option>
                            <option value="sepeda">Sepeda</option>
                            <option value="scoot">Scooter</option>
                        </select>
                    </td>
                </tr>
            </table> <br>
            <input type="submit" value="Submit" name="submit">
        </form>
   
<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $waktu = $_POST['waktu'];
    $jenis = $_POST['jenis'];
    
    if ($jenis == "motor") {
        $harga = 70000;
    } elseif ($jenis == "sepeda") {
        $harga = 25000;
    } else {
        $harga = 30000;
    }

    class rental {

        public $nama, $waktu, $jenis, $harga, $diskon;
        private $listMember = ['ana', 'sam', 'alex', 'ara'];
        
        public function __construct($nama, $waktu, $jenis, $harga) { 
            $this->nama = $nama;
            $this->waktu = $waktu;
            $this->jenis = $jenis;
            $this->harga = $harga; 
        }
        public function pajak() {
            return 10000; 
        }
        public function diskon() {
            return 0.05;
        }

        public function hasil() {
            $pajak = $this->pajak();

            if (in_array($this->nama, $this->listMember)) {
                $diskon = $this->diskon();
                $harga = $this->harga * $this->waktu; 
                $hargaD = $harga * $diskon;
                $hsd = $harga - $hargaD ;
                $hasil = $hsd + $pajak ;
                ?><div class="card"><?php
                echo "$this->nama  berstatus sebagai Member mendapatkan diskon sebesar 5% <br> 
                      Jenis kendaraan yang dirental adalah $this->jenis selama $this->waktu hari <br> 
                      Harga rental perharinya : Rp." . number_format($harga,2,",",".") . "<br><br>
                    Besar yang harus dibayarkan adalah Rp.". number_format($hasil,2,",",".");
                return $hasil; ?></div><?php
            } else {
                $harga = $this->harga * $this->waktu;
                $hasil = $harga + $pajak ;
                ?> <div class="card"><?php
                echo "$this->nama belum terdaftar sebagai Member.<br> 
                      Jenis kendaraan yang dirental adalah $this->jenis selama $this->waktu hari <br> 
                      Harga rental perharinya : Rp." . number_format($this->harga,2,",",".") . "<br><br>
                      Besar yang harus dibayarkan adalah Rp.". number_format($hasil,2,",",".");
                      ?> </div> <?php
            }
        }
    }
   
    $rental = new rental($nama, $waktu, $jenis, $harga); 
    $rental->hasil();
}?>
</center>
</body>
</html>
