<?php
class Motor
{
    public $jenis,
        $hari,
        $nama_peminjam;
    protected $totalPembayaran,
        $diskon,
        $pajak = 10000;
    private $Vario,
        $Beat,
        $Mio,
        $listMember = ['sufyan', 'okta', 'kevin', 'angger', 'kholqi', 'abyan'];

    function __construct()
    {
        $this->pajak = 10000;
        $this->diskon = 0.05;
    }

    public function setHarga($tipeVario, $tipeBeat, $tipeMio)
    {
        $this->Vario = $tipeVario;
        $this->Beat = $tipeBeat;
        $this->Mio = $tipeMio;
    }

    public function getListMember()
    {
        return $this->listMember;
    }

    public function setListName($nama)
    {
        $this->nama_peminjam = $nama;
    }

    public function getListName()
    {
        return $this->nama_peminjam;
    }

    public function getHarga()
    {
        $dataPinjamanMotor["Vario"] = $this->Vario;
        $dataPinjamanMotor["Beat"] = $this->Beat;
        $dataPinjamanMotor["Mio"] = $this->Mio;
        return $dataPinjamanMotor;
    }
}

class Perental extends Motor
{
    public function hargaRentalNonMember()
    {
        $dataHargaMotor = $this->getHarga();
        $lamaRental = $this->hari * $dataHargaMotor[$this->jenis];
        $hargaRental = $lamaRental + $this->pajak;
        return $hargaRental;
    }

    public function hargaRentalMember()
    {
        $dataHargaMotor = $this->getHarga();
        $lamaRental = $dataHargaMotor[$this->jenis] * $this->hari;
        $diskon = $this->diskon * $lamaRental;
        $hargaDiskon = $lamaRental - $diskon;
        $hargaRental = $hargaDiskon + $this->pajak;
        return $hargaRental;
    }

    public function CetakBuktiRental()
    {
        $dataHargaMotor = $this->getHarga();
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