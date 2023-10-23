<?php
class motor {
    protected $pajak; 
    private $mio,     
            $astrea,
            $skupi,
            $vario,
            $supra;
    public $jumlah;
    public $nama;
    public $jenis;
    public $member = ['nisa', 'riski', 'udin', 'madun', 'asep'];

    function __construct() {
        $this->pajak = 10000;
    }

    public function setHarga($motor1, $motor2, $motor3, $motor4, $motor5) {
        $this->mio = $motor1;
        $this->astrea = $motor2;
        $this->skupi = $motor3;
        $this->vario = $motor4;
        $this->supra = $motor5;
    }

    public function getHarga() {
        $data["mio"] = $this->mio;
        $data["astrea"] = $this->astrea;
        $data["skupi"] = $this->skupi;
        $data["vario"] = $this->vario;
        $data["supra"] = $this->supra;
        return $data;
    }
}

class Beli extends motor {
    public function hargarental() {
        $dataHarga = $this->getHarga();
        $hargarental = $this->jumlah * $dataHarga[$this->jenis];
    
        
        
        if (in_array($this->nama, $this->member)) {
            $diskon = $hargarental * 0.05;
            $hargarental = $hargarental - $diskon;
        }
    
      
        $hargaBayar = $hargarental + $this->pajak;
    
        return $hargaBayar;
    }
    

    public function cetakPembelian() {
        $totalHarga = $this->hargarental(); 
        
        echo "<div class ='tampil'>";
        echo "<center>";
        echo "Nama : " . $this->nama . "<br>";
        echo "Waktu rental: " . $this->jumlah . " hari<br>";
    
        if (in_array($this->nama, $this->member)) {
            $diskon = $totalHarga * 0.05;
            echo "Anda adalah member dan mendapatkan diskon 5% (Rp. " . number_format($diskon, 0, '', '.') . ")<br>";
            $totalHarga -= $diskon;
        }
        
        echo "Total yang harus anda bayar Rp. " . number_format($totalHarga, 0, '', '.') . "<br>";
       
        echo "</center>";
        echo "</div>" ;
    }
    
}


?>