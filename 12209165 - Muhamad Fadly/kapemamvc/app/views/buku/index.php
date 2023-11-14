<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>
    <div class="d-flex justify-content-between">
        <div>
            <a href="<?= BASE_URL; ?>/buku/tambah" class="btn btn-primary">Tambah barang</a>
        </div>
        <div class="d-flex">
            <form action="<?= BASE_URL; ?>/buku/cari" method="post" class="d-flex">
                <input type="text" class="form-control" name="search" placeholder="Cari Barang....">
                <button class="btn  btn-light ms-1 " type="submit">Cari</button>
        
            </form>
            <a href="<?= BASE_URL; ?>/buku/index" class="btn btn-danger ms-2">reset</a>
        </div>
    </div>
    <br>

    <table class="table  table-striped table-bordered">

        <thead>

            <tr>

                <th scope="col">no</th>
                <th scope="col">nama barang</th>
                <th scope="col">jenis barang</th>
                <th scope="col">no barang</th>
                <th scope="col">Tanggal pinjam</th>
                <th scope="col">Tanggal kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>

        </thead>
        <tbody> 
            <?php $no=1; ?>
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
        
        $tglSekarang = date('Y-m-d H:i:s');

        if ($tglSekarang <= $row['tgl_kembali']) {
         
                  echo "<div class='alert alert-danger' role='alert'>
          Belum Kembali!
            </div>";
        } else {
            echo "<div class='alert alert-success' role='alert'>
            Sudah Kembali!
                    </div>";
        }
        ?>
      </td>
                <td>
                        <?php
                        if($tglSekarang < $row['tgl_kembali']) {
                          echo "<a href='".BASE_URL."/buku/edit/".$row['id']."' class='btn btn-primary'>Edit</a>";
                        }
                        ?>
                        <a href="<?= BASE_URL ?>/buku/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                </td>
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>
    </table>
</div>