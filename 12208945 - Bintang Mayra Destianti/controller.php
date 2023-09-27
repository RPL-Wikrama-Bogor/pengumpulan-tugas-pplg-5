<?php
class Motor {
    private $hargaScoopy;
    private $hargaharley;
    private $hargaBeat;
    private $listMember = ['bintang', 'mayra', 'awa'];

    public $motorYangDipilih;
    public $waktuRental;
    public $namaPelanggan;

    protected $totalPembayaran;
    protected $diskon;  
    protected $pajak;

    function __construct() {
        $this->diskon = 0.05;
        $this->pajak = 10000;
    }

    public function setHarga($Scoopy, $harley, $Beat) {
        $this->hargaScoopy = $Scoopy;
        $this->hargaharley = $harley;
        $this->hargaBeat = $Beat;
    }

    public function getlistMember() {
        return $this->listMember;
    }

    public function setListNama($nama) {
        $this->namaPelanggan = $nama;
    }

    public function getListNama() {
        return $this->namaPelanggan;
    }

    public function getHarga() {
        $semuaDataMotor = [
            "Scoopy" => $this->hargaScoopy,
            "harley" => $this->hargaharley,
            "Beat" => $this->hargaBeat
        ];
        return $semuaDataMotor;
    }
}

class Rental extends Motor {
    public function totalHargaRental() {
        $hargaMotor = $this->getHarga();
        $hargaRental = $this->waktuRental * $hargaMotor[$this->motorYangDipilih];
        $hargaRental += 10000;
        return $hargaRental;
    }

    public function hargaDiskon() {
        $hargaMotor = $this->getHarga();
        $hargaRental = $this->waktuRental * $hargaMotor[$this->motorYangDipilih];
        $diskon = $hargaRental * $this->diskon;
        $totalDiskon = $hargaRental + $this->pajak - $diskon;
        return $totalDiskon;
    }

    public function cetakRental() {
        $hargaMotor = $this->getHarga();

        if (in_array(($this->getListNama()), $this->getlistMember())) {
            echo "<div style='text-align: center; border-style: solid; margin: 30px 400px; padding: 15px;'>";
            echo $this->getListNama() . " berstatus sebagai Member mendapatkan diskon 5%<br>";
            echo "Jenis Motor Yang Dirental adalah " .$this->motorYangDipilih . " selama " . $this->waktuRental . " hari<br>";
            echo "Harga Sewa Per Hari Rp. " .number_format($hargaMotor[$this->motorYangDipilih], 0, ',', '.') . "<br>";
            echo "Besar yang harus dibayarkan adalah Rp. " . number_format($this->hargaDiskon(), 0, ',', '.') . "<br>";
        } else {
            echo "<div style='text-align: center; border-style: solid; margin: 30px 400px; padding: 15px;'>";
            echo $this->getListNama() . " tidak berstatus sebagai Member <br>";
            echo "Jenis Motor Yang Dirental adalah " .$this->motorYangDipilih . " selama " . $this->waktuRental . " hari<br>";
            echo "Harga Sewa Per Hari Rp. " .number_format($hargaMotor[$this->motorYangDipilih], 0, ',', '.') . "<br>";
            echo "Besar yang harus dibayarkan adalah Rp. " . number_format($this->totalHargaRental(), 0, ',', '.') . "<br>";
        }
    }
}
?>