<?php 

class PinjamModel {
    
    private $table = 'pinjam';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBuku()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getBukuById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function tambahBuku($data)
    {
        
        if (empty($_POST['nama_peminjam']) || empty($_POST['jenis_barang']) || empty($_POST['no_barang']) || empty($_POST['tgl_pinjam'])) {
            echo '<script>alert("Ada yang gak keisi tolong ulangi");document.location.href = "http://localhost/peminjaman/public/home/page";
            document.getElementById("tambahPeminjamanModal").removeAttribute ="hidden";</script>';
           session_start();
        $_SESSION['modal'] = true;
           
          
          die();
        
        }else{
            $query = "INSERT INTO $this->table (nama_peminjam,jenis_barang,no_barang,tgl_pinjam,tgl_kembali,status) VALUES (:nama_peminjam,:jenis_barang,:no_barang,:tgl_pinjam,:tgl_kembali,:status)";
        $this->db->query($query);
        $data['tgl_kembali'] = date('Y-m-d H:i:s', strtotime($data['tgl_pinjam'] . ' +2 days'));
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('tgl_kembali', $data['tgl_kembali']);
        $this->db->bind('nama_peminjam', $data['nama_peminjam']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('jenis_barang', $data['jenis_barang']);
        $this->db->execute();

        return $this->db->rowCount();
        }
    }

    public function updateDataBuku($data)
    {
        $barangLama = $this->getBukuById($data['id']);
        $tgllama= $barangLama['tgl_kembali'];
        if($tgllama != $data['tgl_kembali']){
            $query = "UPDATE $this->table SET nama_peminjam=:nama_peminjam,jenis_barang=:jenis_barang,no_barang=:no_barang,tgl_pinjam=:tgl_pinjam,tgl_kembali=:tgl_kembali,status=:status WHERE id=:id";
        
        }else{

        $query = "UPDATE $this->table SET nama_peminjam=:nama_peminjam,jenis_barang=:jenis_barang,no_barang=:no_barang,tgl_pinjam=:tgl_pinjam,tgl_kembali=:tgl_kembali,status='belom' WHERE id=:id";
       
        }   
         $this->db->query($query);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_peminjam', $data['nama_peminjam']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('jenis_barang', $data['jenis_barang']);
        $this->db->bind('tgl_kembali', $data['tgl_kembali']);
        $this->db->bind('status', 'sudah');
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteBuku($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function cariBuku($buku)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_peminjam LIKE :nama_peminjam');
        $this->db->bind('nama_peminjam','%' . $buku . '%');
        return $this->db->resultSet();
    }

}
?>