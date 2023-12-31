<?php

class BukuModel
{
  private $table = 'tugas1';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllBuku()
  {
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }

  public function getBukuById($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function tambahBuku($data)
  {
    $tgl_pinjam = $data['tgl_pinjam'];
    $tgl_kembali = date('Y-m-d', strtotime($tgl_pinjam . ' +2 days'));

    $query = "INSERT INTO tugas1 (nama_peminjaman, jenis_barang, no_barang, tgl_pinjam, tgl_kembali) VALUES(:nama_peminjaman, :jenis_barang, :no_barang, :tgl_pinjam, :tgl_kembali)";
    $this->db->query($query);
    $this->db->bind('nama_peminjaman', $data['nama_peminjaman']);
    $this->db->bind('jenis_barang', $data['jenis_barang']);
    $this->db->bind('no_barang', $data['no_barang']);
    $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
    $this->db->bind('tgl_kembali', $tgl_kembali); 
    $this->db->execute();

    // rowCount = menghitung jumlah data
    return $this->db->rowCount();
  }
  public function updateBuku($data)
  {
    $query = "UPDATE tugas1 SET nama_peminjaman=:nama_peminjaman, jenis_barang=:jenis_barang, no_barang=:no_barang, tgl_pinjam=:tgl_pinjam, tgl_kembali=:tgl_kembali WHERE id=:id";
    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $this->db->bind('nama_peminjaman', $data['nama_peminjaman']);
    $this->db->bind('jenis_barang', $data['jenis_barang']);
    $this->db->bind('no_barang', $data['no_barang']);
    $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
    $this->db->bind('tgl_kembali', $data['tgl_kembali']);
    $this->db->execute(); 

    return $this->db->rowCount();
  }

  public function deleteBuku($id)
  {
    // $query = "DELETE FROM tb_buku WHERE id = :id";

    $this->db->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
    $this->db->bind('id', $id);
    $this->db->execute();

    return $this->db->rowCount();
  }
  
  public function cariBuku($barang)
{
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_peminjaman LIKE :barang OR jenis_barang LIKE :barang');
    $this->db->bind(':barang', '%' . $barang . '%');
    return $this->db->resultSet();
}

}