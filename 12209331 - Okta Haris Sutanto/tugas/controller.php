<?php
class DataMotor 
// membuat objek kelas pembelian
{ 
    private $hargaScooter;
    private $hargaAerox;
    private $hargaVario;
    private $listMember = ['okta', 'haris', 'sutanto', 'gemoy'];

    public $jenisYangDipilih;
    public $lamaWaktu;
    public $nama_pengguna;
    
    protected $totalPembayaran;
    protected $diskon;

    protected $pajak;

    // menginisialisasi objek
    function __construct()
    {
        $this->diskon = 0.05;
        $this->pajak = 10000;
    }

    // mengatur harga motor-motor yang disewakan :()    
    public function setHarga($Scooter, $Aerox, $Vario) {
        $this->hargaScooter = $Scooter;
        $this->hargaAerox = $Aerox;
        $this->hargaVario = $Vario;
    }

    public function getlistMember() {
        return $this->listMember;
    }

    public function setListName($nama){
        $this->nama_pengguna = $nama;
    }

    public function getListName(){
        return $this->nama_pengguna;
    }

    public function getHarga() {
        $semuaDataMotor["Scooter"] = $this->hargaScooter;
        $semuaDataMotor["Aerox"] = $this->hargaAerox;
        $semuaDataMotor["Vario"] = $this->hargaVario;
        return $semuaDataMotor;
    }
}

class Pembelian extends DataMotor {
    public function hargaRental()
    {
        $dataHargaMotor = $this->getHarga();
        $hargaRental = $this->lamaWaktu * $dataHargaMotor[$this->jenisYangDipilih];
        $hargaRental = $hargaRental + $this->pajak;
        return $hargaRental;
    }

    public function hargaDiskon()
    {
        $dataHargaMotor = $this->getHarga();
        $hargaRental = $this->lamaWaktu * $dataHargaMotor[$this->jenisYangDipilih];
        $diskon = $hargaRental * $this->diskon;
        $hargaTotalDiskon = $hargaRental + $this->pajak - $diskon;
        return $hargaTotalDiskon;
    }

    public function cetakBukti() 
    {
        $dataHargaMotor = $this->getHarga();
        if (in_array($this->getListName(), $this->getlistMember())) { 
            echo "<table class='table table-striped'>";
            echo "<br><br><br>";
            echo "<div style='border: 3px solid #000000; width: 700px; border-radius: 15px; text-align: center;'>";
            echo "<b style='font-size: 18px;'>";
            echo "<br>";
            echo "Nama Penyewa: " . $this->getListName() . "<br>";
            echo "Jenis Motor yang Disewa: " . $this->jenisYangDipilih . "<br>";
            echo "Harga Motor per Hari: Rp " . number_format($dataHargaMotor[$this->jenisYangDipilih], 0, ',', '.') . "<br>";
            echo "Lama Peminjaman (Hari) : " . $this->lamaWaktu . "<br>";
            echo "Mendapatkan Diskon Sebesar : 5% <br>";
            echo "Pajak : Rp. " . number_format($this->pajak, 0, ',', '.'). "<br>";
            echo "Total Bayaran Setelah Diskon: Rp. " . number_format($this->hargaDiskon(), 0, ',', '.') . "<br>";
            echo "<br>";
            echo "</b>";
            echo "</div>";
            echo "</table>";
        } else {
            echo "<br><br><br>";
            echo "<div style='border: 3px solid #000000; width: 700px; border-radius: 15px; text-align: center;'>";
            echo "<b style='font-size: 18px;'>";
            echo "<br>";
            echo "Nama Penyewa: " . $this->getListName() . "<br>";
            echo "Jenis Motor: " . $this->jenisYangDipilih . "<br>";
            echo "Harga Motor per Hari: Rp " . number_format($dataHargaMotor[$this->jenisYangDipilih], 0, ',', '.') . "<br>";
            echo "Lama Peminjaman (Hari) : " . $this->lamaWaktu . "<br>";
            echo "Anda Tidak Mendapatkan Diskon Karena Bukan Membership <br>";
            echo "Pajak : Rp. " . number_format($this->pajak, 0, ',', '.'). "<br>";
            echo "Total Bayaran : Rp. " . number_format($this->hargaRental(), 0, ',', '.') . "<br>";
            echo "<br>";
            echo "<br>";
            echo "</b>";
            echo "</div>";
        }
    }
}
?>
