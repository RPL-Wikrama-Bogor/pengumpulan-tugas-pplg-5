<?php
class Shell {
    //memberikan nilai atau insitialisasi
    protected $diskon;
    protected $pajak;  
    private $Matic,
            $Scooter,
            $Cross,
            $SportBike;
    public $waktu;
    public $motor;
    public $jenis;
    private $listMember = ['ana', 'sam', 'alex', 'ara'];

    function __construct() {
        $this->diskon = 0.05;
        $this->pajak = 10000;
    }

    public function setHarga($tipe1, $tipe2, $tipe3, $tipe4) {
        $this->Matic = $tipe1;
        $this->Scooter = $tipe2;
        $this->Cross = $tipe3;
        $this->SportBike = $tipe4;
        
    }

    public function getHarga() {
        $data["Matic"] = $this->Matic;
        $data["Scooter"] = $this->Scooter;
        $data["Cross"] = $this->Cross;
        $data["SportBike"] = $this->SportBike;
        return $data;
    }

    public function getDiscount() {
        foreach($this->listMember as $key=>$value){
            if($this->nama == $value){
               $discount = $this->diskon;
               return $discount;
            }
        }
            return 0;
    }
}


class Beli extends Shell {
    public function tampilDiskon(){
        $potongan = $this->getDiscount();
        if($potongan == 0.05){
            echo ucwords($this->nama) . " berstatus sebagai Member mendapatkan diskon sebesar 5%";
        }else {
            echo ucwords($this->nama) . " tidak berstatus sebagai Member";
        }
    }

    public function hargaBeli() {
        $dataHarga = $this->getHarga();
        $jenis = $dataHarga[$this->motor];
        $hargaDiskon = $this->waktu * $jenis * $this->getDiscount();
        $total = ($this->waktu * $jenis) - $hargaDiskon;
        $hargaBayar = $total + $this->pajak;
        return $hargaBayar;
}


    public function cetakPembelian() {
        echo "<center>";
        echo $this->tampilDiskon() . "<br>";
        echo "Jenis motor yang dirental adalah " . $this->motor . " selama " . $this->waktu . " hari<br>";
        echo "Harga rental per-harinya : " .  $this->getHarga()[$this->motor] . "<br><br>";
        echo "Besar yang harus dibayarkan adalah Rp. " . number_format($this->hargaBeli(), 0, '', '.') . "<br>";
        echo "</center>";
    }
}
?>