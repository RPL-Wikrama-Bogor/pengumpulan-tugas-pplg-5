
<?php

class home extends controller { 
public function index()
{
$data['nama_peminjaman'] = 'nama_barang';
$this->view('templates/header', $data);
$this->view('home/index');
$this->view('templates/footer');
}


}