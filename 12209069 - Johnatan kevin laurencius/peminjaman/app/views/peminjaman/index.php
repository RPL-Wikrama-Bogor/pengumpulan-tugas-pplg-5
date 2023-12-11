<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>
        <div class="d-flex justify-content-between">
            <div>
                <a href="<?= BASE_URL;?>/peminjaman/tambah" class="btn btn-primary">Tambah Peminjaman</a>
            </div>
        <div class="d-flex">
            <form action="<?= BASE_URL; ?>/peminjaman/cari" method="post" class="d-flex">
                <input type="text" class="form-control" name="search" placeholder="Cari Nama...">
                <button type="submit" class="btn btn-success" style="margin: 0px 10px">Cari</button>
            </form>
            <a href="<? BASE_URL; ?> /peminjaman/index" class="btn btn-secondary">Reset</a>
        </div>
    </div>
    <br>
    <br>
    <table class="table table-success table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">No Barang</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>
            <?php foreach ($data['peminjaman'] as $row) :?>
                <tr>
                  <td><?= $no; ?></td>  
                  <td><?= $row['nama_peminjam']; ?></td>  
                  <td><?= $row['jenis_barang']; ?></td>  
                  <td><?= $row['no_barang']; ?></td>  
                  <td><?= $row['tgl_pinjam']; ?></td>  
                  <td><?= $row['tgl_kembali']; ?></td> 
                  <td>
                    <?php if($row['status'] == "Sudah Kembali") { ?>
                        <p class="btn btn-success"><?= $row['status']?></p>
                    <?php } else {?>
                        <p class="btn btn-danger"><?= $row['status']?></p>
                        <?php } ?>
                  </td>
                  <td>
                    <?php if($row['status'] == "Belum Kembali") {?>
                        <a href="<?= BASE_URL ?>/peminjaman/edit/<?= $row['id']?>" class="btn btn-primary">Edit</a>
                    <?php } ?>
                        <a href="<?= BASE_URL ?>/peminjaman/hapus/<?= $row['id']?>" class="btn btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                  </td>
                </tr>
                <?php $no++; endforeach; ?>
        </tbody>
    </table>
</div>