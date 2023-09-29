<?php
    

class buku extends controller {
    
    public function index(){
        $data['page'] = 'Data Buku';
        $data['buku'] = $this->model('BukuModel')->getAllBuku();
        $this->view('templates/header',$data);
        $this->view('buku/index',$data);
        $this->view('templates/footer');
    }

    public function tambah(){
        $data['page'] = 'Tambah Buku';
        $this->view('templates/header',$data);
        $this->view('buku/create',$data);
        $this->view('templates/footer');
    }
    public function simpanBuku(){
        
        if (empty($_POST['nama_peminjaman'])) {
            $error_message = "Nama peminjam harus diisi.";
        } elseif (empty($_POST['jenis_barang']) || $_POST['jenis_barang'] == 'Pilih') {
            $error_message = "Jenis barang harus dipilih.";
        } elseif (empty($_POST['no_barang'])) {
            $error_message = "Nomor barang harus diisi.";
        } elseif (empty($_POST['tgl_pinjam'])) {
            $error_message = "Tanggal pinjam harus diisi.";
        }
    
        if (!empty($error_message)) {
            $data['error_message'] = $error_message;
            $data['page'] = 'Tambah Peminjaman';
            $this->view('templates/header', $data);
            $this->view('buku/create', $data);
            $this->view('templates/footer');
            return;
        }
    
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $_POST['tgl_kembali'] = date('Y-m-d H:i:s', strtotime($tgl_pinjam . ' +2 days'));
        
        if ($this->model('BukuModel')->tambahBuku($_POST) > 0) {
            header('location: '. BASE_URL .'/buku/index');
            exit;
        }else {
            header('location: '. BASE_URL .'/buku/index');
            exit;
        }
    }
    public function edit($id){
        $data['page'] = 'Edit Buku';
        $data['buku'] = $this->model('BukuModel')->getBukuById($id);
        $this->view('templates/header',$data);
        $this->view('buku/edit',$data);
        $this->view('templates/footer');
    }
    public function updateBuku(){
        if ($this->model('BukuModel')->updateDataBuku($_POST) > 0) {
            header('location: '. BASE_URL .'/buku/index');
            exit;
        }else {
            header('location: '. BASE_URL .'/buku/index');
            exit;
        }
    }
    public function hapus($id){
        if ($this->model('BukuModel')->deleteBuku($id) > 0) {
            header('location: '. BASE_URL .'/buku/index');
            exit;
        }else {
            header('location: '. BASE_URL .'/buku/index');
            exit;
        }
    }

    public function cari()
    {
        $data['page'] = 'Data Buku';
        $data['buku'] = $this->model('BukuModel')->cariBuku($_POST['search']);
        $this->view('templates/header',$data);
        $this->view('buku/index',$data);
        $this->view('templates/footer');
    }
    
}

