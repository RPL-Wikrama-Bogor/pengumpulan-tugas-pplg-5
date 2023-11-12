<?php
class Data {
    protected $diskon;
    protected $pajak;
    private $Honda,
            $Yamaha,
            $Kawasaki,
            $member = ['dila', 'reza', 'caroline'];
    public $nama;
    public $jenis;
    public $waktu;

    function __construct() {
        $this->diskon = 0.05;
        $this->pajak = 10000;
    }

    public function setHarga($tipe1, $tipe2, $tipe3) {
        $this->Honda = $tipe1;
        $this->Yamaha = $tipe2;
        $this->Kawasaki = $tipe3;
    }

    public function getNama() {
        $data = $this->nama;
        return $data;
    }

    public function getMember() {
        return $this->member;  
    }

    public function getHarga() {
        $data["Honda"] = $this->Honda;
        $data["Yamaha"] = $this->Yamaha;
        $data["Kawasaki"] = $this->Kawasaki;
        return $data;
    }
}

class Beli extends Data {
    public function hargaBeli() {
        $dataHarga = $this->getHarga();
        $hargaBayar = $this->waktu * $dataHarga[$this->jenis];
        $total = $hargaBayar + $this->pajak;
        return $total;
    }

    public function hargaPerHari(){
        $dataHarga = $this->getHarga();
        $hrgPerHari =$dataHarga[$this->jenis];
        return $hrgPerHari;
    }

    public function Member(){
        $dataHarga = $this->getHarga();
        $hargaBeli = $this->waktu * $dataHarga[$this->jenis];
        $hargaDiskon = $hargaBeli * $this->diskon;
        $hargaBayar = $hargaBeli - $hargaDiskon + $this->pajak;
        return $hargaBayar;
    }


    public function cetakPembelian() {
        echo "<div style='text-align: center; border-style: groove; margin: 30px 400px; padding: 15px;'>";
        if (in_array(($this->getNama()), $this->getMember())) {
            echo $this->nama . " berstatus sebagai Member mendapatkan diskon sebesar 5% <br>";
            echo "Besar yang harus dibayarkan adalah Rp. " . number_format($this->Member(), 0, '', '.') . "<br>";
        }else {
            echo $this->nama . " tidak bestatus sebagai Member <br>";
            echo "Besar yang harus dibayarkan adalah Rp. " . number_format($this->hargaBeli(), 0, '', '.') . "<br>";
        }
        echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari <br>";
        echo "Pajak untuk 1 motor adalah " . number_format($this->pajak, 0, '', '.') . "<br>";
        echo "Harga rental per-harinya : " . number_format($this->hargaPerHari(), 0, '', '.') . "<br> <br>";
        echo "</div>"; 


        // if (in_array(($this->getNama()), $this->getMember())) {
        //     echo "<div style='text-align: center; border-style: groove; margin: 30px 400px; padding: 15px;'>";
        //     echo $this->nama . " berstatus sebagai Member mendapatkan diskon sebesar 5% <br>";
        //     echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari <br>";
        //     echo "Pajak untuk 1 motor adalah " . number_format($this->pajak, 0, '', '.') . "<br>";
        //     echo "Harga rental per-harinya : " . number_format($this->hargaPerHari(), 0, '', '.') . "<br> <br>";
        //     echo "Besar yang harus dibayarkan adalah Rp. " . number_format($this->Member(), 0, '', '.') . "<br>";
        //     echo "</div>"; 

        // }else {

        //     echo "<div style='text-align: center; border-style: groove; margin: 30px 400px; padding: 15px;'>";
        //     echo $this->nama . " tidak bestatus sebagai Member <br>";
        //     echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari <br>";
        //     echo "Pajak untuk 1 motor adalah " . number_format($this->pajak, 0, '', '.') . "<br>";
        //     echo "Harga rental per-harinya : " . number_format($this->hargaPerHari(), 0, '', '.') . "<br> <br>";
        //     echo "Besar yang harus dibayarkan adalah Rp. " . number_format($this->hargaBeli(), 0, '', '.') . "<br>";
        //     echo "</div>"; 
        // }
    }

}
?>



