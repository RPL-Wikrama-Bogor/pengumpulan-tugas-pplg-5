<?php
class Shell {

private $aerox, $scoopy, $vario, $pcx , $beat; 
public $hari, $jenis, $nama;
//untuk melakukan properti $ppn dengan nilai 0.05 ketika objek dari kelas ini dibuat
public function __construct(){
    $this->ppn = 0.05;
}
//mengatur harga bebagai motor 
public function setHarga($tipe1, $tipe2, $tipe3, $tipe4, $tipe5){
    $this->aerox = $tipe1;
    $this->scoopy = $tipe2;
    $this->vario = $tipe3;
    $this->pcx = $tipe4;
    $this->beat = $tipe5;
}
//mengambil harga dari from  jenis jenis motor
public function getHarga() {
    $data["aerox"] = $this->aerox;
    $data["scoopy"] = $this->scoopy;
    $data["vario"] = $this->vario;
    $data["pcx"] = $this->pcx;
    $data["beat"] = $this->beat;
    return $data;
}
}

// digunakan untuk menghitung harga beli dan harga bayar berdasarkan beberapa parameter
//beli adalah class turunan dari class Shell dan class beli akan mengambil semua properti di class sheel
    class Beli extends Shell {
    private $listmember = ['yo', 'on', 'ki', 'sen'];

//method hargaBeli() ini mengambil data harga menghitung harga beli berdasarkan beberapa variabel, dan kemudian 
//menghitung harga bayar dengan atau tanpa potongan PPN tergantung pada status keanggotaan pembeli dalam array $listmember. 
    public function hargaBeli() {
        $dataHarga = $this->getHarga();
        $hargaBeli = $this->hari * $dataHarga[$this->jenis];
        $hargaPPN = $this->ppn;

// dihitung berdasarkan status keanggotaan pembeli dalam array $listmember   
// untuk memeriksa suatu nilai di dalam sebuah array uduk mencari nlai yang benar jika ditemukan dan mengembalikan nilai yang salah
        if (in_array($this->nama, $this->listmember)) {
            $hargaBayar = $hargaBeli - ($hargaBeli * $hargaPPN);
        return $hargaBayar;
        }
        $hargaBayar = $hargaBeli ;
        return $hargaBayar;
        
        
    }

public function cetakPembelian() {
    if (in_array($this->nama, $this->listmember)) {
        echo "<center>";
        echo "----------------------------------------------" . "<br>";
        echo "Nama Anda ada di member : " . $this->nama .
        "<br>". " mendapatkan diskon sebesar 5%" . "<br>";
        echo "Anda merental sebuah motor : " . $this->jenis ."<br>";
        echo "Dengan Waktu : " . $this->hari . " Hari <br>";
        echo "Total yang harus anda bayar Rp. " . number_format($this->hargaBeli(), 0, '', '.') . "<br>";
        // echo " <a href='bayar.php'>bayar</a>" ."<br>";
        echo "----------------------------------------------";
        echo "</center>";
    } else {
        echo "<center>";
        echo "----------------------------------------------" . "<br>";
        echo "Nama Anda : " . $this->nama . "<br>";
        echo "Anda merental sebuah motor : " . $this->jenis . "<br>";
        echo "Dengan lama : " . $this->hari . " Hari <br>";
        echo "Total yang harus anda bayar Rp. " . number_format($this->hargaBeli(), 0, '', '.') . "<br>";
        echo "----------------------------------------------";
        echo "</center>";
    }
}
}