<?php
class motor {

private $beat, $scoopy, $vario, $klx; 
public $hari, $jenis, $nama;
protected $Diskon = 0.05;

public function __construct(){
    $this->Diskon = 0.05;
}

public function setHarga($tipe1, $tipe2, $tipe3, $tipe4){
    $this->beat = $tipe1;
    $this->scoopy = $tipe2;
    $this->vario = $tipe3;
    $this->klx = $tipe4;
}

public function getHarga() {
    $data["beat"] = $this->beat;
    $data["scoopy"] = $this->scoopy;
    $data["vario"] = $this->vario;
    $data["klx"] = $this->klx;
    return $data;
}
}

class nyewa extends motor {
private $listmember = ['komar','rizki', ' lon', 'don'];

public function hargaBeli() {
    $dataHarga = $this->getHarga();
    $hargaBeli = $this->hari * $dataHarga[$this->jenis];
    $hargaDiskon = $this->Diskon;

   
    if (in_array($this->nama, $this->listmember)) {
        $member=$hargaBeli*$hargaDiskon;
        $hargaBayar = $hargaBeli - ($hargaBeli * $hargaDiskon)+10000-500;
    return $hargaBayar;
    }
    $hargaBayar = $hargaBeli+10000 ;
    return $hargaBayar;
    
    
}
public function hargaBeli1() {
    $dataHarga = $this->getHarga();
    $hargaBeli = $this->hari * $dataHarga[$this->jenis];
    $hargaDiskon = $this->Diskon;

   
    $hargaBayar = $hargaBeli+10000 ;
    return $hargaBayar;
    
    
}


public function cetakPembelian() {
    
    if (in_array($this->nama, $this->listmember)) {
        echo '<div class="container ">';
        echo '<table class="table table-bordered mt-5">';
        echo '<thead>';
        echo '<tr>';
        echo '<th colspan="2">Total รถจักรยานยนต์</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>Nama Anda ada di member:</td>';
        echo '<td>' . $this->nama . ' mendapatkan diskon sebesar 5%</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Anda merental sebuah motor:</td>';
        echo '<td>' . $this->jenis . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Anda merental perhari motor:</td>';
        echo '<td>' . number_format(($this->hargaBeli1() - 10000) / $this->hari, 0, '', '.') . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Dengan lama:</td>';
        echo '<td>' . $this->hari . ' Hari</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Total yang harus anda bayar(termasuk dengan ppn) :</td>';
        echo '<td>Rp. ' . number_format($this->hargaBeli(), 0, '', '.') . '</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo '<div class="container">';
        echo '<table class="table table-bordered mt-5">';
        echo '<thead>';
        echo '<tr>';
        echo '<th colspan="2">Total รถจักรยานยนต์</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>Nama:</td>';
        echo '<td>' . $this->nama . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Anda merental sebuah motor:</td>';
        echo '<td>' . $this->jenis . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Anda merental perhari motor:</td>';
        echo '<td>' . number_format(($this->hargaBeli() - 10000) / $this->hari, 0, '', '.') . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Dengan lama:</td>';
        echo '<td>' . $this->hari . ' Hari</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Total yang harus anda bayar(termasuk dengan ppn) :</td>';
        echo '<td>Rp. ' . number_format($this->hargaBeli(), 0, '', '.') . '</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }
  
    
}
}