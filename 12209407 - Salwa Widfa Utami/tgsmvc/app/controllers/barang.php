<?php

class barang extends Controller {

    public function index()
    {
        $data['page'] = 'Data Pinjaman';
        $data['barang'] = $this->model('Pinjam')->getAll();
        $this->view('templates/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['page'] = 'Tambah Pinjaman';
        $this->view('templates/header', $data);
        $this->view('barang/create');
        $this->view('templates/footer');
    }

    public function simpan()
    {
        $_POST['tgl_kembali'] = date('Y-m-d H:i:s', strtotime($_POST['tgl_pinjam'] . ' +2 days'));
        if ($this->model('Pinjam')->tambah($_POST) > 0 ) {
            header('location: '. BASE_URL . '/barang/index');
            exit;
        } else {
            header('location: '. BASE_URL. '/barang/index');
            exit;
        }
    }

    public function edit($id){

        $data['page'] = 'Edit Pinjaman';
        $data['barang'] = $this->model('Pinjam')->getById($id);
        $this->view('templates/header', $data);
        $this->view('barang/edit', $data);
        $this->view('templates/footer');

    }

    public function update(){
        if( $this->model('Pinjam')->update($_POST) > 0 ) {
            header('location: ' . BASE_URL . '/barang/index');
            exit;
        }else{
            header('location: ' . BASE_URL . '/barang/index');
            exit;
        }
    }

    public function hapus($id){
        if( $this->model('Pinjam')->delete($id) > 0 ) {
            header('location: ' . BASE_URL . '/barang/index');
            exit;
        }else{
            header('location: ' . BASE_URL . '/barang/index');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Data Pinjaman';
        $data['barang'] = $this->model('Pinjam')->cari($_POST['search']);
        $this->view('templates/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }
}
?>