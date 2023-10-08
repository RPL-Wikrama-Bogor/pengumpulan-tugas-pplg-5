<?php

class buku extends controller {

    public function index()
    {
        $data['page'] = 'data buku';
        $data['buku'] = $this->model('bukumodel')->getallbuku();
        $this->view('templates/header',$data);
        $this->view('buku/index',$data);
        $this->view('templates/footer');
    }

    public function tambah()
{
    $data['page'] = 'tambah buku';
    $this->view('templates/header',$data);
    $this->view('buku/create');
    $this->view('templates/footer');
}

public function simpanbuku(){
    $tgl_pinjam = $_POST['tgl_pinjam'];
        $_POST['tgl_kembali'] = date('Y-m-d H:i:s', strtotime($tgl_pinjam . ' +2 days'));
    if($this->model('bukumodel')->tambahbuku($_POST) > 0) {
        header('location: '. BASE_URL . ' /buku/index ');
        exit;
    }else{
        header('location: '.BASE_URL . ' /buku/index ');
       exit;
    }
}

public function edit($id){

    $data['page'] = 'Edit buku';
    $data['buku'] = $this->model('BukuModel')->getBukuById($id);
    $this->view('templates/header',$data);
    $this->view('buku/edit',$data);
    $this->view('templates/footer');
}

public function updatebuku(){
    if($this->model('bukumodel')->updatedatabuku($_POST) > 0) {
        header('location: '. BASE_URL .'/buku/index');
        exit;
    }else{
        header('location: '.BASE_URL . '/buku/index');
        exit;
    }
}

public function hapus($id){
    if($this->model('BukuModel')->deletebuku($id) > 0) {
        header('location: '.BASE_URL.'/buku/index');
        exit;
    }else{
        header('location: '.BASE_URL.'/buku/index');
        exit;
    }
}

public function cari()
    {
        $data['page'] = 'data Buku';
        $data['buku'] = $this->model('bukuModel')->cariBuku($_POST['search']);
        $this->view('templates/header',$data);
        $this->view('buku/index',$data);
        $this->view('templates/footer');
    }

} 