<?php
class rentalMotor {
    private $hargaBeat,
            $hargaVario,
            $hargaPcx,
            $listVIP = ["khairul", "sufyan", "okta", "naya"];

    public $jenisYangDipilih,
           $lamaWaktu,
           $nama_pengguna;
    
    protected $totalPembayaran,
              $diskon,
              $pajak;

    function __construct()
    {
        $this->diskon = 0.05;
        $this->pajak = 10000;
    }
  
    public function setHarga($beat, $vario, $pcx) {
        $this->hargaBeat = $beat;
        $this->hargaVario = $vario;
        $this->hargaPcx = $pcx;
    }

    public function getListVIP() {
        return $this->listVIP;
    }

    public function setListName($nama){
        $this->nama_pengguna = $nama;
    }

    public function getListName(){
        return $this->nama_pengguna;
    }

    public function getHarga() {
        $semuaDataMotor["beat"] = $this->hargaBeat;
        $semuaDataMotor["vario"] = $this->hargaVario;
        $semuaDataMotor["pcx"] = $this->hargaPcx;
        return $semuaDataMotor;
    }
}

class Pembelian extends rentalMotor {
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

        if (array_search($this->getListName(), $this->getListVIP())) {
            echo "<center>";
            echo "<br>";    
            echo $this->getListName() . " bersetatus sebagai member mendapatkan diskon 5%" . "<br>";
            echo "Jenis motor yang di rental adalah " . $this->jenisYangDipilih . " selama " . $this->lamaWaktu . " hari" . "<br>";
            echo "Harga rantal per-harinya: Rp " . number_format($dataHargaMotor[$this->jenisYangDipilih], 0, ',', '.') . "<br>";
            echo "Pajak : Rp. " . number_format($this->pajak, 0, ',', '.'). "<br>";
            echo "Besar yang harus di bayarkan adalah Rp. " . number_format($this->hargaDiskon(), 0, ',', '.');
        } else {
            echo "<center>";
            echo "<br>";
            echo $this->getListName() . " meminjam motor " . $this->jenisYangDipilih . " selama " . $this->lamaWaktu . " hari" . "<br>";
            echo "Harga rental perharinya: " . number_format($dataHargaMotor[$this->jenisYangDipilih], 0, ',', '.') . "<br>";
            echo "Pajak : Rp. " . number_format($this->pajak, 0, ',', '.'). "<br>";
            echo "Besar yang harus di bayarkan adalah : Rp. " . number_format($this->hargaRental(), 0, ',', '.');
        }
    }
}
?>
