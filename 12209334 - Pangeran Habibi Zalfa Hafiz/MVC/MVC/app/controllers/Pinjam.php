<?php

class Pinjam extends Controller
{

    public function index()
    {
        $data['pinjam'] = $this->model('PinjamModel')->getAllPinjam();
        $this->view('templates/header', $data);
        $this->view('pinjam/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['page'] = 'Tambah Pinjam';
        $this->view('templates/header', $data);
        $this->view('pinjam/create');
        $this->view('templates/footer');
    }

    public function simpanPinjam()
    {
        $_POST['tgl_kembali'] = date('Y-m-d H:i:s', strtotime($_POST['tgl_pinjam'] . ' +2 days'));

        if ($this->model('PinjamModel')->tambahPinjam($_POST) > 0) {
            header('location: ' . BASE_URL . '/Pinjam/index');
            exit;
        } else {
            header('location: ' . BASE_URL . '/Pinjam/index');
            exit;
        }
    }

    public function edit($id)
    {
        $data['page'] = 'Edit Pinjam';
        $data['pinjam'] = $this->model('PinjamModel')->getPinjamById($id);
        $this->view('templates/header', $data);
        $this->view('pinjam/edit', $data);
        $this->view('templates/footer');
    }


    public function updatePinjam()
    {
        if ($this->model('PinjamModel')->updateDataPinjam($_POST) > 0) {
            header('location: ' . BASE_URL . '/pinjam/index');
            exit;
        } else {
            header('location: ' . BASE_URL . '/pinjam/index');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('PinjamModel')->deletePinjam($id) > 0) {
            header('location: ' . BASE_URL . '/pinjam/index');
            exit;
        } else {
            header('location: ' . BASE_URL . '/pinjam/index');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Data Pinjam';
        $data['pinjam'] = $this->model('PinjamModel')->cariPinjam($_POST['search']);
        $this->view('templates/header', $data);
        $this->view('pinjam/index', $data);
        $this->view('templates/footer');
    }
}
