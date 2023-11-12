<?php
class Buku extends Controller
{
  public function index()
  {
    $data['page'] = 'Daftar Buku';
    $data['buku'] = $this->model('BukuModel')->getAllBuku();
    $this->view('templates/header', $data);
    $this->view('buku/index', $data);
    $this->view('templates/footer');
  }
  public function tambah()
  {
    $data['page'] = 'Tambah Buku';
    $this->view('templates/header', $data);
    $this->view('buku/create', $data);
    $this->view('templates/footer');
  }

  public function simpanBuku()
  {
    
$tgl_pinjam = $_POST['tgl_pinjam'];

// Ubah tanggal dengan menambahkan 2 hari
$_POST['tgl_kembali'] = date('Y-m-d H:i:s', strtotime($tgl_pinjam . ' +2 days'));

// Sekarang, $tgl_kembali berisi tanggal yang sudah diubah



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

  if ($this->model('BukuModel')->tambahBuku($_POST) > 0) {
    header('Location: ' . BASE_URL . '/buku/index');
    exit;
  } else {
    header('Location: ' . BASE_URL . '/buku/index');
    exit;
  }
}

    // if ($this->model('BukuModel')->tambahBuku($_POST) > 0) {
    //   header('Location: ' . BASE_URL . '/buku/index');
    //   exit;
    // } else {
    //   header('Location: ' . BASE_URL . '/buku/index');
    //   exit;
    // }
  }

  public function edit($id)
  {
    $data['page'] = 'Edit Buku';
    $data['buku'] = $this->model('BukuModel')->getBukuById($id);
    $this->view('templates/header', $data);
    $this->view('buku/edit', $data);
    $this->view('templates/footer');
  }

  public function updateBuku()
  {
    if ($this->model('BukuModel')->updateBuku($_POST) > 0) {
      header('Location: ' . BASE_URL . '/buku/index');
      exit;
    } else {
      header('Location: ' . BASE_URL . '/buku/index');
      exit;
    }
  }

  public function hapus($id)
  {
    if ($this->model('BukuModel')->deleteBuku($id) > 0) {
      // Flasher::setFlash('berhasil', 'menghapus', 'success');
      header('Location: ' . BASE_URL . '/buku/index');
      exit;
    } else {
      // Flasher::setFlash('gagal', 'menghapus', 'danger');
      header('Location: ' . BASE_URL . '/buku/index');
      exit;
    }
  }

  public function cari()
  {
    $data['page'] = 'Data Buku';
    $data['buku'] = $this->model('BukuModel')->cariBuku($_POST['search']);
    $this->view('templates/header', $data);
    $this->view('buku/index', $data);
    $this->view('templates/footer');
  }
  function namaFunction() {

}
}
