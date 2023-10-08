<?php
class Rental {
    protected $discount,
              $pajak;
    private $adv,
            $aerox,
            $motorlistrik,
            $vario;
    public $jumlah,
           $jenis;
    private $listMember = ['ana', 'ani', 'anu', 'noa'];
    function __construct(){
        $this->discount = 0.05;
        $this->pajak = 10000;
    }

    public function setHarga($adv, $aerox, $motorlistrik, $vario){
        $this->adv = $adv;
        $this->aerox = $aerox;
        $this->motorlistrik = $motorlistrik;
        $this->vario = $vario;
    }

    public function getHarga() {
        $data["adv"] = $this->adv;
        $data["aerox"] = $this->aerox;
        $data["motor listrik"] = $this->motorlistrik;
        $data["vario"] = $this->vario;
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
    
    public function hargaBeli(){
        $dataH = $this->getHarga();
        $fee = $dataH[$this->jenis];
        $diskon = $this->jumlah * $fee * $this->getDiscount();
        $totalHarga = ($this->jumlah * $fee) - $diskon + $this->pajak;
        return $totalHarga;
    }
    
    public function tampilDiskon(){
        $promo = $this->getDiscount();
        if($promo == 0.05){
            echo ucwords($this->namaP) . " berstatus sebagai Member mendapatkan diskon sebesar 5%";
        }else {
            echo ucwords($this->namaP) . " tidak berstatus sebagai Member";
        }
    }
    
    public function cetakPembelian() {
        echo "<center>";
        echo $this->tampilDiskon();
        echo "<br>Jenis motor yang di rental adalah "  . $this->jenis . " selama " . $this->jumlah . " hari <br>";
        echo "Harga rental per-harinya : " . $this->getHarga()[$this->jenis] . " <br>";
        echo "Besar yang harus dibayarkan adalah Rp. " . number_format($this->hargaBeli(), 0, '', '.') . "<br>";
        echo "</center></div>";
    }
}
?>