<?php

class Rental {
    protected $discount;
    protected $tax;
    private $aerox,
            $vario,
            $beat,
            $vesmet;
    public $jumlah;
    public $jenis;
    public $nama;
    public $member = ["Rainy", "awa", "hujan"];

    function __construct() {
        $this->discount = 0.05;
        $this->tax = 10000;
    }

    public function setHarga($tipe1, $tipe2, $tipe3, $tipe4) {
        $this->aerox = $tipe1;
        $this->vario = $tipe2;
        $this->beat = $tipe3;
        $this->vesmet = $tipe4;
    }

    public function getHarga() {
        $data["aerox"] = $this->aerox;
        $data["vario"] = $this->vario;
        $data["beat"] =  $this->beat;
        $data["vesmet"] = $this->vesmet;
        return $data;
    }

    public function getDiscount() {
        return $this->discount;
    }
}

class Beli extends Rental {
    
    public function hargaBeli(){
        $dataH = $this->getHarga();
        $fee = $dataH[$this->jenis];
        $diskon = $this->jumlah * $fee * $this->getDiscount();
        $totalHarga = ($this->jumlah * $fee) + $this->tax - $diskon;
        return $totalHarga;
    }
    public function hargaPerhari(){
        $dataHarga = $this->getHarga();
        $hrgperhari =$dataHarga[$this->jenis];
        return $hrgperhari;

    }
    
    public function tampilDiskon(){
        $promo = $this->getDiscount();
        if($promo == 0.05){
            echo ucwords($this->nama) . " berstatus sebagai Member mendapatkan diskon sebesar 5%";
        }else {
            echo ucwords($this->nama) . " tidak berstatus sebagai Member";
        }
    }

    public function cetakpembelian () {
        echo "<div style = 'border-style: solid;  margin: 5px 30rem; padding: 10px; text-align: center;'>";
        echo '<h3>bukti rental</h3>';
        echo $this->nama . " berstatus sebagai " . (in_array($this->nama, $this->member) ? "Member" : "Non-Member"). " ";
        echo (in_array($this->nama, $this->member) ? "mendapatkan diskon sebesar " . $this->discount . "%" : "mendapatkan diskon sebesar 0%") . "<br>";
        echo "Jenis motor yang di rental adalah " . $this->jenis . " selama " . $this->jumlah . " hari<br>";
        echo "Harga rental per harinya: Rp. " . number_format($this->hargaPerhari(), 0, ',', '.') . "<br><br>";
        echo "Besar yang harus di bayarkan adalah :<b> Rp. " . number_format($this->hargaBeli(), 0, ',', '.') . "</b>";
    }
}
