<?php

class buku extends Controller {
    public function index()
    {
        $data['page'] = 'Data Buku';
        $data['buku'] = $this->model('BukuModel')->getAllBarang();
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['page'] = 'Tambah Buku';
        $this->view('templates/header', $data);
        $this->view('buku/create');
        $this->view('templates/footer');
    }

    public function simpanBarang()
    {  
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $_POST['tgl_kembali'] = date('Y-m-d H:i:s', strtotime($tgl_pinjam . ' +2 days'));

        if (empty($_POST['nama_peminjam']) || empty($_POST['jenis_barang']) || empty($_POST['no_barang']) || empty($_POST['tgl_pinjam'])) {
            $msg = "Silahkan isi";

        if (empty($_POST['nama_peminjam'])) {
            $msg .= " Nama";
        }
        if (empty($_POST['jenis_barang'])) {
            $msg .= " Jenis";
        }
        if (empty($_POST['no_barang'])) {
            $msg .= " No barang";
        }
        if (empty($_POST['tgl_pinjam'])) {
            $msg .= " Tanggal Peminjam";
        }

        echo "<script>alert('$msg');</script>";
        $this->tambah($msg);
        return;
    } else {

    if ($this->model('BukuModel')->tambahElektronik($_POST) > 0) {
        header('Location: ' . BASE_URL . '/buku/index');
        exit;
    } else {
        header('Location: ' . BASE_URL . '/buku/index');
        exit;
    }
    }
}
    

    public function edit($id)
    {
        $data['page'] = 'Edit Buku';
        $data['buku'] = $this->model('BukuModel')->getBarangById($id);
        $this->view('templates/header', $data);
        $this->view('buku/edit', $data);
        $this->view('templates/footer');
    }

    public function updateData()
    {
        if ($this->model('BukuModel')->updateElektronik($_POST) > 0 )
        {
            header('location: '. BASE_URL . '/buku/index');
            exit;
        } else {
            header('location: '. BASE_URL . '/buku/index');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('BukuModel')->deleteBarang($id) > 0) {
            header('location: '. BASE_URL . '/buku/index');
            exit;
        } else {
            header('location: '. BASE_URL . '/buku/index');
            exit;
        }
    }

    public function cari() {
        $data['page'] = 'Data Buku';
        $data['buku'] = $this->model('BukuModel')->cariBuku($_POST['search']);
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');
    }
}