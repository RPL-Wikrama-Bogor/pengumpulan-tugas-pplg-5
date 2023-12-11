<?php
class motor
{
    protected $diskon;
    protected $pajak;
    private $supraks,
        $beat,
        $astrea,
        $shogun;
    private $member = ['bopeng', 'jacob', 'ivi', 'bayek'];
    public $jumlah_hari;
    public $jenis_motor;
    public $nama_pengguna;

    function __construct()
    {
        $this->diskon = 0.05;
        $this->pajak = 10000;
    }

    public function getListMember()
    {
        return $this->member;
    }

    public function setListName($nama)
    {
        $this->nama_pengguna = $nama;
    }

    public function getListName()
    {
        return $this->nama_pengguna;
    }

    public function setHargaMotor($motor1, $motor2, $motor3, $motor4)
    {
        $this->supraks = $motor1;
        $this->beat = $motor2;
        $this->astrea = $motor3;
        $this->shogun = $motor4;
    }

    public function getHargaMotor()
    {
        $motor['supra'] = $this->supraks;
        $motor['beat'] = $this->beat;
        $motor['astrea'] = $this->astrea;
        $motor['shogun'] = $this->shogun;
        return $motor;
    }
}
class rental extends motor
{
    public function hargaRental()
    {
        $dataHargaMotor = $this->getHargaMotor();
        $hargaRental = $this->jumlah_hari * $dataHargaMotor[$this->jenis_motor] + $this->pajak;
        return $hargaRental;
    }

    public function hargaDiskon()
    {
        $dataHargaMotor = $this->getHargaMotor();
        $hargaRental = $this->jumlah_hari * $dataHargaMotor[$this->jenis_motor];
        $diskon = $hargaRental * $this->diskon;
        $hargaTotalDiskon = $hargaRental - $diskon + $this->pajak;
        return $hargaTotalDiskon;
    }
    public function cetakStruk()
    {
        $dataHargaMotor = $this->getHargaMotor();

        // if (in_array($this->getListName(), $this->getListMember())) {
        //     echo "<center>";
        //     echo "===== Struk Rental Motor Membership ===== <br>";
        //     echo "Nama Pengguna: " . ucfirst($this->getListName()) . "<br>";
        //     echo "Jenis Motor: " . ucfirst($this->jenis_motor) . "<br>";
        //     echo "Harga Motor per Hari: Rp " . number_format($dataHargaMotor[$this->jenis_motor], 0, ',', '.') . "<br>";
        //     echo "Lama Peminjaman (hari) : " . $this->jumlah_hari . "<br>";
        //     echo "Mendapatkan Diskon Sebesar : 5% <br>";
        //     echo "Terkena Pajak : Rp." . number_format($this->pajak, 0, ',', '.') . "<br>";
        //     echo "Total Bayaran Setelah Diskon dan Pajak: Rp. " . number_format($this->hargaDiskon(), 0, ',', '.') . "<br>";
        //     echo "==================================\n";
        //     echo "</center>";
        // } else {
        //     echo "<center>";
        //     echo "===== Struk Rental Motor Tidak Membership ===== <br>";
        //     echo "Nama Pengguna: " . ucfirst($this->getListName()) . "<br>";
        //     echo "Jenis Motor: " . ucfirst($this->jenis_motor) . "<br>";
        //     echo "Harga Motor per Hari: Rp " . number_format($dataHargaMotor[$this->jenis_motor], 0, ',', '.') . "<br>";
        //     echo "Lama Peminjaman (hari) : " . $this->jumlah_hari . "<br>";
        //     echo "Anda Tidak Mendapatkan Diskon Karena Bukan Membership <br>";
        //     echo "Terkena Pajak : Rp." . number_format($this->pajak, 0, ',', '.') . "<br>";
        //     echo "Total Bayaran : Rp. " . number_format($this->hargaRental(), 0, ',', '.') . "<br>";
        //     echo "==================================\n";
        //     echo "</center>";
        // }t

        echo "<center>";
        echo (in_array($this->getListName(), $this->getListMember())) ? "===== Struk Rental Motor Membership ===== <br>" : "===== Struk Rental Motor Tidak Membership ===== <br>";
        echo "Nama Pengguna: " . ucfirst($this->getListName()) . "<br>";
        echo "Jenis Motor: " . ucfirst($this->jenis_motor) . "<br>";
        echo "Harga Motor per Hari: Rp " . number_format($dataHargaMotor[$this->jenis_motor], 0, ',', '.') . "<br>";
        echo "Lama Peminjaman (hari) : " . $this->jumlah_hari . "<br>";
        echo (in_array($this->getListName(), $this->getListMember())) ? "Mendapatkan Diskon Sebesar : 5% <br>" : "Anda Tidak Mendapatkan Diskon Karena Bukan Membership <br>";
        echo "Terkena Pajak : Rp." . number_format($this->pajak, 0, ',', '.') . "<br>";
        if(in_array($this->getListName(), $this->getListMember())) {
            echo "Total Harga: Rp." . number_format($this->hargaDiskon(), 0, ',', '.') . "<br>";
        } else {
            echo "Total Harga: Rp." . number_format($this->hargaRental(), 0, ',', '.') . "<br>";
        }
        echo "==================================\n";
        echo "</center>";
    }
}
