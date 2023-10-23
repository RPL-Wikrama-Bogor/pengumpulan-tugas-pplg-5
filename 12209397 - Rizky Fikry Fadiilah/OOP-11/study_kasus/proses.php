<?php

class Motor
{
    // Properti publik
    public $jenis, $hari, $nama_peminjam;
    
    // Properti proteksi
    protected $totalPembayaran, $diskon, $pajak;
    
    // Properti pribadi
    private $Vario, $Beat, $Aerox, $listMember = ['fikry', 'jesen', 'tio', 'dion', 'azhril', 'rizki'];

    // Konstruktor
    function __construct()
    {
        $this->pajak = 10000;
        $this->diskon = 0.05;
    }

    // Metode untuk mengatur harga motor
    public function setHarga($tipeVario, $tipeBeat, $tipeAerox)
    {
        $this->Vario = $tipeVario;
        $this->Beat = $tipeBeat;
        $this->Aerox = $tipeAerox;
    }

    // Metode untuk mendapatkan daftar member
    public function getListMember()
    {
        return $this->listMember;
    }

    // Metode untuk mengatur nama peminjam
    public function setListName($nama)
    {
        $this->nama_peminjam = $nama;
    }

    // Metode untuk mendapatkan nama peminjam
    public function getListName()
    {
        return $this->nama_peminjam;
    }

    // Metode untuk mendapatkan harga motor
    public function getHarga()
    {
        $dataPinjamanMotor["Vario"] = $this->Vario;
        $dataPinjamanMotor["Beat"] = $this->Beat;
        $dataPinjamanMotor["Aerox"] = $this->Aerox;
        return $dataPinjamanMotor;
    }
}

class Perental extends Motor
{
    // Metode untuk menghitung harga rental untuk non-member
    public function hargaRentalNonMember()
    {
        $dataHargaMotor = $this->getHarga();
        $lamaRental = $this->hari * $dataHargaMotor[$this->jenis];
        $hargaRental = $lamaRental + $this->pajak;
        return $hargaRental;
    }

    // Metode untuk menghitung harga rental untuk member
    public function hargaRentalMember()
    {
        $dataHargaMotor = $this->getHarga();
        $diskon = $this->diskon * $dataHargaMotor[$this->jenis];
        $lamaRental = $dataHargaMotor[$this->jenis] * $this->hari;
        $hargaDiskon = $lamaRental - $diskon;
        $hargaRental = $hargaDiskon + $this->pajak;
        return $hargaRental;
    }

    // Metode untuk mencetak bukti rental
    public function CetakBuktiRental()
    {
        $dataHargaMotor = $this->getHarga();

        // Memeriksa apakah peminjam adalah member atau bukan
        if (in_array($this->getListName(), $this->getListMember())) {
            echo ucfirst($this->getListName()) . " berstatus sebagai Member mendapatkan <br>";
            echo "diskon sebesar 5% <br>";
            echo "Jenis Motor yang dirental adalah : " . ucfirst($this->jenis) . "<br>";
            echo "selama : " . $this->hari . " hari<br>";
            echo "Harga rental per-harinya : Rp " . number_format($dataHargaMotor[$this->jenis], 0, ',', '.') . "<br>";
            echo "Total Bayaran : Rp. " . number_format($this->hargaRentalMember(), 0, ',', '.') . "<br>";
        } else {
            echo ucfirst($this->getListName()) . " tidak berstatus sebagai Member<br>";
            echo "Jenis Motor yang dirental adalah : " . ucfirst($this->jenis) . "<br>";
            echo "selama : " . $this->hari . " hari<br>";
            echo "Harga rental per-harinya : Rp " . number_format($dataHargaMotor[$this->jenis], 0, ',', '.') . "<br>";
            echo "Total Bayaran : Rp. " . number_format($this->hargaRentalNonMember(), 0, ',', '.') . "<br>";
        }
    }
}