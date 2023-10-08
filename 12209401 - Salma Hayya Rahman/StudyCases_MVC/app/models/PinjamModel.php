<?php
require_once '../app/core/Database.php'; 
class PinjamModel{
    private $table = 'mvcpeminjaman' ;
    private $db ;

    public function __construct()
    {
        $this->db = new Database ;
    }

    public function getAllPinjam()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getPinjamById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id ') ;
        $this->db->bind('id' , $id) ;
        return $this->db->single() ;
    }

    public function tambahPinjam($data)
    {
        $query = "INSERT INTO mvcpeminjaman (nama_peminjam, jenis_barang, no_barang, tgl_pinjam, tgl_kembali ) VALUES(:nama_peminjam, :jenis_barang, :no_barang, :tgl_pinjam, :tgl_kembali)" ;
        $this->db->query($query) ;
        $this->db->bind('nama_peminjam' , $data['nama_peminjam']) ;
        $this->db->bind('jenis_barang' , $data['jenis_barang']) ;
        $this->db->bind('no_barang' , $data['no_barang']) ;
        $this->db->bind('tgl_pinjam' , $data['tgl_pinjam']) ;
        $this->db->bind('tgl_kembali' , $data['tgl_kembali']) ;
        $this->db->execute() ;

        return $this->db->rowCount() ;
    }

    public function updateDataPinjam($data)
    {
        $query = "UPDATE mvcpeminjaman SET nama_peminjam =:nama_peminjam, jenis_barang=:jenis_barang, no_barang=:no_barang, tgl_pinjam=:tgl_pinjam , tgl_kembali=:tgl_kembali   WHERE id=:id" ;
        $this->db->query($query) ;
        $this->db->bind('id' , $data['id']) ;
        $this->db->bind('nama_peminjam' , $data['nama_peminjam']) ;
        $this->db->bind('jenis_barang' , $data['jenis_barang']) ;
        $this->db->bind('no_barang' , $data['no_barang']) ;
        $this->db->bind('tgl_pinjam' , $data['tgl_pinjam']) ;
        $this->db->bind('tgl_kembali' , $data['tgl_kembali']) ;
        $this->db->execute() ;

        return $this->db->rowCount() ;
    }

    public function deletePinjam($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id') ;
        $this->db->bind('id' , $id) ;
        $this->db->execute() ;

        return $this->db->rowCount() ;
        
    }
    public function cariPinjam($keyword)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE nama_peminjam LIKE :keyword OR jenis_barang LIKE :keyword";
        $this->db->query($query);
        
        // Bind parameter dengan kata kunci pencarian (tanpa tanda persen di sisi kanan)
        $this->db->bind('keyword', '%' . $keyword . '%');
        
        return $this->db->resultSet();
    }
    
}