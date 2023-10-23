<?php

class BukuModel
{
  private $table = 'tb_inventaris';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllBuku()
  {
    $this->db->query('SELECT * FROM ' . $this->table);
    // $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC LIMIT 1');
    // $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id ASD');
    return $this->db->resultSet();
  }

  public function getBukuById($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
    // bind 
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function tambahBuku($data)
  {
    $query = "INSERT INTO tb_inventaris (nama_peminjam, jenis_barang, no_barang, tgl_pinjam) VALUES(:namaPeminjam, :jenisBarang, :noBarang, :tglPinjam)";

    $this->db->query($query);
    $this->db->bind('namaPeminjam', $data['nama_peminjam']);
    $this->db->bind('jenisBarang', $data['jenis_barang']);
    $this->db->bind('noBarang', $data['no_barang']);
    $this->db->bind('tglPinjam', $data['tgl_pinjam']);
    $this->db->execute();

    // rowCount = menghitung jumlah data
    return $this->db->rowCount();
  }
  public function updateBuku($data)
  {
    $query = "UPDATE tb_inventaris SET nama_peminjam=:namaPeminjam, jenis_barang=:jenisBarang, no_barang=:noBarang, tgl_pinjam=:tglPinjam, tgl_kembali=:tglKembali WHERE id=:id";
    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $this->db->bind('namaPeminjam', $data['nama_peminjam']);
    $this->db->bind('jenisBarang', $data['jenis_barang']);
    $this->db->bind('noBarang', $data['no_barang']);
    $this->db->bind('tglPinjam', $data['tgl_pinjam']);
    $this->db->bind('tglKembali', $data['tgl_kembali']);
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

  public function cariBuku($buku)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_peminjam LIKE :namaPeminjam');
    $this->db->bind('namaPeminjam', '%' . $buku . '%');
    return $this->db->resultSet();
  }
}
