<?php
class Rental {
    protected $discount,
              $pajak;
    private $scooter,
            $motocross,
            $motorlain;
    public $jumlah,
           $jenis;
    private $listMember = ['ana', 'sam', 'alex', 'ara'];
    function __construct(){
        $this->discount = 0.05;
        $this->pajak = 10000;
    }

    public function setHarga($merk1, $merk2, $merk3, $merk4){
        $this->scooter = $merk1;
        $this->motocross = $merk2;
        $this->matic = $merk3;
        $this->sportbike = $merk4;
    }

    public function getHarga() {
        $data["scooter"] = $this->scooter;
        $data["motocross"] = $this->motocross;
        $data["matic"] = $this->matic;
        $data["sportbike"] = $this->sportbike;
        return $data;
    }
    
    public function getDiscount() {
        foreach($this->listMember as $key=>$value){
            if($this->namaP == $value){
               $diskon = $this->discount;
               return $diskon;
            }
        }
        return 0;
    }
}

class Beli extends Rental {
    public function tampilDiskon(){
        $promo = $this->getDiscount();
        if($promo == 0.05){
            echo ucwords($this->namaP) . " berstatus sebagai Member mendapatkan diskon sebesar 5%";
        }else {
            echo ucwords($this->namaP) . " tidak berstatus sebagai Member";
        }
    }

    public function hargaBeli(){
        $dataH = $this->getHarga();
        $fee = $dataH[$this->jenis];
        $diskon = $this->jumlah * $fee * $this->getDiscount();
        $totalHarga = ($this->jumlah * $fee) - $diskon + $this->pajak;
        return $totalHarga;
    }

    public function cetakPembelian() {
        echo "<div style='border: 1px solid black;padding: 20px 7px 20px 7px;line-height:30px;width:500px;margin:0 auto;'>
        <center>";
        echo $this->tampilDiskon();
        echo "<br>Jenis motor yang di rental adalah "  . $this->jenis . " selama " . $this->jumlah . " hari <br>";
        echo "Harga rental per-harinya : " . $this->getHarga()[$this->jenis] . " <br>";
        echo "Besar yang harus dibayarkan adalah Rp. " . number_format($this->hargaBeli(), 0, '', '.') . "<br>";
        echo "</center></div>";
    }
}
?>