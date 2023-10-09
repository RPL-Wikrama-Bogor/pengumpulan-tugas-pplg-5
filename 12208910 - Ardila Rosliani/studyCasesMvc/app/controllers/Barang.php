<?php

class Barang extends Controller{

    public function index()
    {
        $data['page'] = 'Data Barang';
        $data['barang'] = $this->model('BarangModel')->getAllBarang();
        $this->view('templates/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['page'] = 'Tambah Barang';
        $this->view('templates/header', $data);
        $this->view('barang/create');
        $this->view('templates/footer');
    }

    public function simpanBarang(){
        
        $tgl= $_POST['tgl_pinjam'];
        $tgl1= date('Y-m-d H:i:s', strtotime('+2 days', strtotime($tgl)));
        $_POST['tgl_kembali'] = $tgl1;
        $status = 'belum kembali';
        $_POST['status'] = $status;

        if ($this->model('BarangModel')->tambahBarang($_POST) > 0) {
            header('location: ' . BASE_URL . '/barang/index');
            exit;
        }else {
            header('location: ' . BASE_URL . '/barang/index');
            exit;
        }
    }

    public function edit($id){
        $data['page'] = 'Edit Barang';
        $data['barang'] = $this->model('BarangModel')->getBarangById($id);
        $this->view('templates/header', $data);
        $this->view('barang/edit', $data);
        $this->view('templates/footer');
    }

    public function updateBarang(){
        $status = 'sudah kembali';
        $_POST['status'] = $status;
        if ($this->model('BarangModel')->updateDataBarang($_POST) > 0) {
            header('location: ' . BASE_URL . '/barang/index');
            exit;
        }else {
            header('location: ' . BASE_URL . '/barang/index');
            exit;
        }
    }

    public function hapus($id){
        if ($this->model('BarangModel')->deleteBarang($id) > 0) {
            header('location: ' . BASE_URL . '/barang/index');
            exit;
        }else {
            header('location: ' . BASE_URL . '/barang/index');
            exit;
        }
    }

    public function cari()
    {
        $data['page'] = 'Data Barang';
        $data['barang'] = $this->model('BarangModel')->cariBarang($_POST['search']);
        $this->view('templates/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }
}