<div class="container">
    <h3 class="mb-3">Daftar Baru</h3>
    <br>
    <div class="d-flex justify-content-between">
            <div>
                <a href="<?= BASE_URL;?>/buku/tambah" class="btn btn-primary">Tambah Buku</a>
            </div>
        <div class="d-flex">
            <form action="<?= BASE_URL; ?>/buku/cari" method="post" class="d-flex">
                <input type="text" class="form-control" name="search" placeholder="Cari Buku...">
                <button type="submit" class="btn btn-success">Cari</button>
            </form>
            <a href="<? BASE_URL; ?>/buku/index" class="btn btn-secondary">Reset</a>
        </div>
    </div>
   
    <br>
    <br>
    <table class="table table-success table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjaman</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Nomor Barang</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data['buku'] as $row) :?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['nama_peminjaman']; ?></td>
                    <td><?= $row['jenis_barang']; ?></td>
                    <td><?= $row['no_barang']; ?></td>
                    <td><?= $row['tgl_pinjam']; ?></td>
                    <td><?= $row['tgl_kembali']; ?></td>
                <td>
<?php
    $tglKembali = $row['tgl_kembali'];
    $tglSekarang = date('Y-m-d H:i:s');
      if ($tglSekarang > $tglKembali) {
          echo "<div class='alert alert-primary' role='alert'>
          Sudah Kembali!
          </div>";
        } else {
          echo "<div class='alert alert-danger' role='alert'>
          Belum Kembali!
        </div>";
        }
?>
            </td>
                    <td>
                    <?php
                        if($tglSekarang < $tglKembali) {
                          echo "<a href='".BASE_URL."/buku/edit/".$row['id']."' class='btn btn-primary'>Edit</a>";
                        }
                        ?>
                        <a href="<?= BASE_URL ?>/buku/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                        
                    </td>
                </tr>
                
                
                <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
