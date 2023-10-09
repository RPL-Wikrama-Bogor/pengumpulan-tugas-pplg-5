<?php

class buku extends Controller {
    public function index()
    {
        $data['buku'] = $this->model('pinjam')->getAll();
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');

    }

    public function tambah()
    {
        $data['buku'] = 'Tambah Buku';
        $this->view('templates/header', $data);
        $this->view('buku/create');
        $this->view('templates/footer');
    }

    public function simpan()
    {
        $tgl = $_POST['tgl_pinjam'];
        $tgl1= date('Y-m-d H:i:s', strtotime('+2 days', strtotime($tgl)));
        $_POST['tgl_kembali']=$tgl1;
        if ($this->model('Pinjam')->tambah($_POST) > 0) {
            header('location: ' . BASE_URL . '/buku/index');
            exit;
        } else {
            header('location: ' . BASE_URL . '/buku/index');
            exit;
        }
    }
    public function edit($id){
        $data['page'] = 'Edit Buku';
        $data['buku'] = $this->model('pinjam')->getById($id);
        $this->view('templates/header', $data);
        $this->view('buku/edit', $data);
        $this->view('templates/footer');
    }

    public function updateData(){
        if($this->model('pinjam')->updateData($_POST) > 0 ){
            header('location: '. BASE_URL . '/buku/index');
            exit;
        }else {
            header('location: '. BASE_URL . '/buku/index');
            exit;
        }
    }

    public function hapus($id){
        if($this->model('pinjam')->delete($id) > 0 ){
            header('location: '. BASE_URL . '/buku/index');
            exit;
        }else {
            header('location: '. BASE_URL . '/buku/index');
            exit;
        }
    }

    public function cari(){
        $data['title'] = 'Data Buku';
        $data['buku'] = $this->model('pinjam')->cari($_POST['search']);
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');
    }
}

