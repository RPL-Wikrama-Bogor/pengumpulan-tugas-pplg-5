<?php
Class Penyewaan {
    // Private properties for motorcycle prices
    private $Z1000;
    private $zx25r;
    private $ducati;
    private $h2;
    
    // Public properties for rental details
    public $nama;
    public $hari;
    public $jenis;
    public $member = "fazri"; // Set the default member here
    
    // Constructor to set tax rate
    public function __construct() {
        $this->ppn = 0.1; // 10% tax rate
    }

    // Method to set prices for motorcycle types
    public function setHarga($tipe1, $tipe2, $tipe3, $tipe4) {
        $this->z1000 = $tipe1;
        $this->zx25r = $tipe2;
        $this->ducati = $tipe3;
        $this->h2 = $tipe4;
    }

    // Method to get prices as an associative array
    public function getHarga() {
        $data["z1000"] = $this->z1000;
        $data["zx25r"] = $this->zx25r;
        $data["ducati"] = $this->ducati;
        $data["h2"] = $this->h2;
        return $data;
    }
}

class SEWA extends Penyewaan {
    // Method to calculate rental cost
    public function hargaSEWA() {
        $dataHarga = $this->getHarga();
        $hargaSEWA = $this->hari * $dataHarga[$this->jenis];
        $hargaPPN = $hargaSEWA * $this->ppn;

        // Apply a discount if applicable
       $discount = 0;
       if ($this->member === "fazri") { // You can change the condition for applying the discount
           $discount = 0.1; // 10% discount
       }

       // Calculate the discounted cost
       $hargaDiskon = $hargaSEWA * (1 - $discount);

       $hargaBayar = $hargaDiskon + $hargaPPN + 10000; // Add 10,000 for tax
       return $hargaBayar;

    }

    // Method to print rental details
    public function cetakPenyewaan() {
        echo "<center>";
        echo "----------------------------------------------" . "<br>";
        echo "Nama: " . $this->nama . "<br>";
        echo "Anda menyewa motor dengan tipe " . $this->jenis . "<br>";
        echo "Berapa hari sewa: " . $this->hari . " hari <br>";

        // Display discount information
        if ($this->member === "fazri") {
            echo "Anda mendapatkan diskon 5%.<br>";
        }

        echo "Total yang harus Anda bayar Rp. " . number_format($this->hargaSEWA(), 0, '', '.') . "<br>";
        echo "----------------------------------------------";
        echo "</center>";
    }
}

?>