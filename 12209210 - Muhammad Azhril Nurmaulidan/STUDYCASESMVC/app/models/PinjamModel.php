<?php 

class PinjamModel {
    
    private $table = 'tb_pinjam';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPinjam()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getPinjamById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function tambahPinjam($data)
    {
       
        // Tambahkan kode PHP untuk menghitung tanggal kembali otomatis (tambahkan 2 hari)
        $data['tgl_kembali'] = date('Y-m-d H:i:s', strtotime($data['tgl_pinjam'] . ' +2 days')); 
        $query = "INSERT INTO tb_pinjam (nama, jenis_barang, no_barang, tgl_pinjam, tgl_kembali) VALUES (:nama, :jenis_barang, :no_barang, :tgl_pinjam, :tgl_kembali)";
        $this->db->query($query);
        
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jenis_barang', $data['jenis_barang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('tgl_kembali', $data['tgl_kembali']);
        
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
    

    public function updateDataPinjam($data)
    {
        $query = "UPDATE tb_pinjam SET id=:id, nama=:nama, jenis_barang=:jenis_barang, no_barang=:no_barang ,tgl_pinjam=:tgl_pinjam, tgl_kembali=:tgl_kembali WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jenis_barang', $data['jenis_barang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('tgl_kembali', $data['tgl_kembali']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletePinjam($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
?>