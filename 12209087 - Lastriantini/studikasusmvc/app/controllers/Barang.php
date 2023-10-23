<?php

class Barang extends Controller {

    public function index()
    {
        $data['page'] = 'Data Barang';
        $data['barang'] = $this->model('pinjamModel')->getAllbarang();
        $this->view('templates/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['page'] = 'Tambah Barang';
        $this->view('templates/header', $data);
        $this->view('Barang/create');
        $this->view('templates/footer');
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(count($_POST) == 4){
            
        }else{
            echo "data belum terisi penuh";
            header('location: '. BASE_URL . '/barang/tambah');
        }
        }
    }

    public function simpanBarang() {
        if($_POST['tgl_pinjam']){
            $tgl= $_POST['tgl_pinjam'];
            $tgl1= date('Y-m-d H:i:s', strtotime('+2 days', strtotime($tgl)));
            $_POST['tgl_kembali'] = $tgl1;
        }
        if( $this->model('pinjamModel')->tambahBarang($_POST) > 0 ) {
            header('location: '. BASE_URL . '/barang/index');
            exit;
        }else{
            header('location: '. BASE_URL . '/barang/index');
            exit;
        }
    }

    public function edit($id)
    {

        $data['page'] = 'Edit Barang';
        $data['barang'] = $this->model('pinjamModel')->getBarangById($id);
        $this->view('templates/header', $data);
        $this->view('Barang/edit', $data);
        $this->view('templates/footer');

    }

    public function updateBarang() {
        if( $this->model('pinjamModel')->updateDataBarang($_POST) > 0 ) {
            header('location: '. BASE_URL . '/barang/index');
            exit;
        }else{
            header('location: '. BASE_URL . '/barang/index');
            exit;
        }
    }

    public function hapus($id) {
        if( $this->model('pinjamModel')->deleteBarang($id) > 0 ) {
            header('location: '. BASE_URL . '/barang/index');
            exit;
        }else{
            header('location: '. BASE_URL . '/barang/index');
            exit;
        }
    }

    public function cari() {
        $data['page'] = 'Data Barang';
        $data['barang'] = $this->model('pinjamModel')->cariNama($_POST['search']);
        $this->view('templates/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }

}