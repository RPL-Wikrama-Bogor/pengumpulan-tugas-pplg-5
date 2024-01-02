<?php

class Pinjam extends Controller
{

    public function index()
    {
        $data['judul'] = 'Home';
        $data['pinjam'] = $this->model('PinjamModel')->getAllPinjam();
        $this->view('templates/header', $data);
        $this->view('pinjam/index', $data);
        $this->view('templates/footer');
    }

    public function tambah($msg = NULL)
    {
        $data['judul'] = 'Tambah Pinjam';
        $data['pesan'] = $msg;
        $data['nama_peminjam_value'] = isset($_POST['nama_peminjam']) ? $_POST['nama_peminjam'] : '';
        $data['jenis_barang_value'] = isset($_POST['jenis_barang']) ? $_POST['jenis_barang'] : '';
        $data['no_barang_value'] = isset($_POST['no_barang']) ? $_POST['no_barang'] : '';
        $data['tgl_pinjam_value'] = isset($_POST['tgl_pinjam']) ? $_POST['tgl_pinjam'] : '';
        $this->view('templates/header', $data);
        $this->view('pinjam/create', $data);
        $this->view('templates/footer');
    }

    public function simpanPinjam()
    {
        $_POST['tgl_kembali'] = date('Y-m-d H:i:s', strtotime($_POST['tgl_pinjam'] . ' +2 days'));
        if (empty($_POST['nama_peminjam']) || empty($_POST['jenis_barang']) || empty($_POST['no_barang']) || empty($_POST['tgl_pinjam'])) {
            $msg = "Data masih ada yang kosong. Mohon isi kolom berikut: ";

            if (empty($_POST['nama_peminjam'])) {
                $msg .= "nama peminjam,";
            }

            if (empty($_POST['jenis_barang'])) {
                $msg .= "jenis barang,";
            }

            if (empty($_POST['no_barang'])) {
                $msg .= "nomor barang,";
            }

            if (empty($_POST['tgl_pinjam'])) {
                $msg .= "tanggal pinjam,";
            }

            echo "<script>alert('$msg masih kosong');</script>";
            $this->tambah($msg);
            return;
        } else {
            if ($this->model('PinjamModel')->tambahPinjam($_POST) > 0) {
                header('location: ' . BASE_URL . '/Pinjam/index');
                exit;
            } else {
                header('location: ' . BASE_URL . '/Pinjam/index');
                exit;
            }
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Pinjam';
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
        $data['judul'] = 'Data Pinjam';
        $data['pinjam'] = $this->model('PinjamModel')->cariPinjam($_POST['search']);
        $this->view('templates/header', $data);
        $this->view('pinjam/index', $data);
        $this->view('templates/footer');
    }
}
