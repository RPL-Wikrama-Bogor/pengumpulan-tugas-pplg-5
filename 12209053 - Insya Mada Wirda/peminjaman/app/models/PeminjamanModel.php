<?php

class PeminjamanModel
{
    private $table = 'tb_peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPeminjaman($data)
    {
        $filterQuery = " WHERE 1";

        if (isset($data['search'])) {
            $filterQuery .= ' AND nama_peminjam LIKE "%' . $data['search'] . '%"';
            $filterQuery .= ' OR jenis_barang LIKE "%' . $data['search'] . '%"';
        }

        $this->db->query("SELECT * FROM " . $this->table . $filterQuery);
        return $this->db->resultSet();
    }

    public function getPeminjamanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahPeminjaman($data)
    {
        $query = "INSERT INTO tb_peminjaman (nama_peminjam, jenis_barang, no_barang, tgl_pinjam) VALUES(:nama_peminjam, :jenis_barang, :no_barang, :tgl_pinjam)";
        $this->db->query($query);
        $this->db->bind('nama_peminjam', $data['nama_peminjam']);
        $this->db->bind('jenis_barang', $data['jenis_barang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataPeminjaman($data)
    {
        $query = "UPDATE tb_peminjaman SET nama_peminjam=:nama_peminjam, jenis_barang=:jenis_barang, no_barang=:no_barang, tgl_pinjam=:tgl_pinjam, tgl_kembali=:tgl_kembali WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_peminjam', $data['nama_peminjam']);
        $this->db->bind('jenis_barang', $data['jenis_barang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);

        // cek apabila inputan tgl_kembali di isi di form edit
        if ($data['tgl_kembali'] != null) {
            $tgl_kembali = $data['tgl_kembali'];
        } else {
            $tgl_kembali = null;
        }

        $this->db->bind('tgl_kembali', $tgl_kembali);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletePeminjaman($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
