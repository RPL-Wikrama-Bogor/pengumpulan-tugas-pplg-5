<?php 
class Pinjam extends Controller {

    public function index()
    {
        $pinjamModel = $this->model('PinjamModel');
        $data['Pinjam'] = $pinjamModel->getAllPinjam();
    
        $this->view('templates/header', $data);
        $this->view('Pinjam/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $this->view('templates/header');
        $this->view('Pinjam/create');
        $this->view('templates/footer');
    }

    public function tambahPinjam()  
    {
        $pinjamModel = $this->model('PinjamModel');

        $data = [
            'nama' => $_POST['nama'],
            'jenis_barang' => $_POST['jenis_barang'],
            'no_barang' => $_POST['no_barang'],
            'tgl_pinjam' => $_POST['tgl_pinjam'],
        ];

        if ($pinjamModel->tambahPinjam($data) > 0 ) {
            header('location: ' . BASE_URL . '/pinjam/index');
            exit;
        } else {
            header('location: ' . BASE_URL . '/pinjam/index');
            exit;
        }
    }

    public function edit($id){
        $pinjamModel = $this->model('PinjamModel');
        $data['pinjam'] = $pinjamModel->getPinjamById($id);
        $this->view('templates/header', $data);
        $this->view('Pinjam/edit', $data);
        $this->view('templates/footer');
    }

    public function updatePinjam()
    {
        $pinjamModel = $this->model('PinjamModel');

        $data = [
            'id' => $_POST['id'],
            'nama' => $_POST['nama'],
            'jenis_barang' => $_POST['jenis_barang'],
            'no_barang' => $_POST['no_barang'],
            'tgl_pinjam' => $_POST['tgl_pinjam'],
            'tgl_kembali' => $_POST['tgl_kembali'], // Jika perlu
        ];

        if ($pinjamModel->updateDataPinjam($data) > 0 ) {
            header('location: ' . BASE_URL . '/pinjam/index');
            exit;
        } else {
            header('location: ' . BASE_URL . '/pinjam/index');
            exit;
        }
    }

    public function hapus($id){
        $pinjamModel = $this->model('PinjamModel');

        if ($pinjamModel->deletePinjam($id) > 0) {
            header('location: ' . BASE_URL . '/pinjam/index');
            exit;
        } else {
            header('location: ' . BASE_URL . '/pinjam/index');
            exit;
        }
    }
}
