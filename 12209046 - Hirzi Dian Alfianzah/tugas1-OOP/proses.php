<?php
class motor {
    protected $pajak  = 10000; //properti protect tidak bisa di gunakan di luar class
    private $R1,      //hak akses yang melarang method atau property yang menggunakan nya di larang di akses dari luar class
            $XSR900,
            $ZX25RR,
            $R6,
            $H2R;
    public $hari;  //public bisa di gunakan di class mana saja
    public $nama;
    public $jenis;
    public $harga;
    public $member = ['Hirzi', 'Dian', 'Alfi'];

    public function setHarga($tipe1, $tipe2, $tipe3, $tipe4, $tipe5) {
        $this->R1 = $tipe1;
        $this->XSR900 = $tipe2;
        $this->ZX25RR = $tipe3;
        $this->R6 = $tipe4;
        $this->H2R = $tipe5;
    }

    public function getHarga() {
        $data["R1"] = $this->R1;
        $data["XSR900"] = $this->XSR900;
        $data["ZX25RR"] = $this->ZX25RR;
        $data["R6"] = $this->R6;
        $data["H2R"] = $this->H2R;
        return $data;
    }
}

class rental extends motor {
    public function hargaRental() {
        $dataHarga = $this->getHarga();
        $hargarental = $this->hari * $dataHarga[$this->jenis];
        $hargaBayar = $hargarental + $this->pajak;


        // Cek apakah nama pengguna ada dalam variabel member
        if (in_array($this->nama, $this->member)) {
            //Jika member diskon 5%
            $diskon = $hargarental * 0.05;
            $hargarental = $diskon;
        }

        return $hargaBayar;
    }

    public function cetakPeminjaman() {
        $totalHarga = $this->hargaRental(); 
        // Menampilkan hasil
        echo "<div class ='tampil'>";
        echo "<center>";
        echo "Nama : " . $this->nama . "<br>";
        echo "Jenis Motor Yang Di Pinjam :" . $this->jenis . "<br>" ;
        echo "Waktu rental: " . $this->hari . " hari<br>";
    
        if (in_array($this->nama, $this->member)) {
            echo $this->nama . " anda adalah member dan mendapatkan diskon Sebesar 5% <br>";
        }
        echo "Total yang harus anda bayar Rp. " . number_format($totalHarga) . "<br>";
       
        echo "</center>";
        echo"</div>" ;
    }
}
?>