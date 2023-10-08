<?php 

class pinjam extends controller{
    public function index(){
        $data['page'] = 'Data Pinjam';
        $data['pinjam'] = $this->model('pinjamModel')->getAllPinjam();
        $this->view('templates/header', $data);
        $this->view('pinjam/index', $data);
        $this->view('templates/footer');
    }

    public function tambah($msg = NULL){
        $data['page'] = 'Tambah Pinjam';
        $data['nama_peminjam_value'] = isset($_POST['nama_peminjam']) ? $_POST['nama_peminjam'] : '';
        $data['jenis_barang_value'] = isset($_POST['jenis_barang']) ? $_POST['jenis_barang'] : '';
        $data['no_barang_value'] = isset($_POST['no_barang']) ? $_POST['no_barang'] : '';
        $data['tgl_pinjam_value'] = isset($_POST['tgl_pinjam']) ? $_POST['tgl_pinjam'] : '';

        $this->view('templates/header', $data);
        $this->view('pinjam/create', $data);
        $this->view('templates/footer');
    }

    public function simpanPinjam(){
        if (empty($_POST['nama_peminjam']) || empty($_POST['jenis_barang']) || empty($_POST['no_barang']) || empty($_POST['tgl_pinjam'])) 
        {
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
          } else 
      
            if( $this->model('pinjamModel')->tambahPinjam($_POST) > 0){
                header('location: '. BASE_URL . '/pinjam/index');
                exit;
            }else{
                header('location: '. BASE_URL . '/pinjam/index');
                exit;  
            }
    }

    public function edit($id){
        $data['page'] = 'Edit Pinjam';
        $data['pinjam'] = $this->model('pinjamModel')->getpinjamById($id);
        $this->view('templates/header', $data);
        $this->view('pinjam/edit', $data);
        $this->view('templates/footer');
    }

    public function updatePinjam(){
        if($this->model('pinjamModel')->updateDataPinjam($_POST) > 0){
            header('location: '. BASE_URL . '/pinjam/index');
            exit;
        }else{
            header('location: '. BASE_URL . '/pinjam/index');
            exit;
        }
    }

    public function hapus($id){
        if($this->model('pinjamModel')->deletepinjam($id) > 0){
            header('location: '. BASE_URL . '/pinjam/index');
            exit;
        }else{
            header('location: '. BASE_URL . '/pinjam/index');
            exit;
        } 
    }

    public function cari(){
        $data['page'] = 'Data Pinjam';
        $data['pinjam'] = $this->model('pinjamModel')->cariPinjam($_POST['search']);
        $this->view('templates/header', $data);
        $this->view('pinjam/index', $data);
        $this->view('templates/footer');
    }
}

?>