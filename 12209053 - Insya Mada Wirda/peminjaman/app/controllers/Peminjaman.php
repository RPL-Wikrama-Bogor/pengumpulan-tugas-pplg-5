<?php

class Peminjaman extends Controller
{
    public function index()
    {
        $data['search'] = $_GET['search'] ?? null;
        $data['page'] = 'Data Peminjaman';
        $data['peminjaman'] = $this->model('PeminjamanModel')->getAllPeminjaman($data);
        $this->view('templates/header', $data);
        $this->view('peminjaman/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['page'] = 'Tambah Peminjaman';
        $this->view('templates/header', $data);
        $this->view('peminjaman/create');
        $this->view('templates/footer');
    }

    public function simpanPeminjaman()
    {
        if ($this->model('PeminjamanModel')->tambahPeminjaman($_POST) > 0) {
            header('location: ' . BASE_URL . '/peminjaman/index');
            exit;
        } else {
            header('location: ' . BASE_URL . '/peminjaman/index');
            exit;
        }
    }

    public function edit($id)
    {
        $data['page'] = 'Edit Peminjaman';
        $data['peminjaman'] = $this->model('PeminjamanModel')->getPeminjamanById($id);
        $this->view('templates/header', $data);
        $this->view('peminjaman/edit', $data);
        $this->view('templates/footer');
    }

    public function updatePeminjaman()
    {
        if ($this->model('PeminjamanModel')->updateDataPeminjaman($_POST) > 0) {

            header('location: ' . BASE_URL . '/peminjaman/index');
            exit;
        } else {
            header('location: ' . BASE_URL . '/peminjaman/index');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('PeminjamanModel')->deletePeminjaman($id) > 0) {
            header('location: ' . BASE_URL . '/peminjaman/index');
            exit;
        } else {
            header('location: ' . BASE_URL . '/peminjaman/index');
            exit;
        }
    }
}
