<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>
    <div class="d-flex justify-content-between">
        <div>
            <a href="<?= BASE_URL; ?>/barang/tambah" class="btn btn-primary">Tambah Buku</a>
        </div>
        <div class="d-flex">
            <form action="<?= BASE_URL ?>/barang/cari" method="post" class="d-flex">
                <input type="text" class="form-control" name="search" placeholder="Cari Nama...">
                <button type="submit" class="btn btn-outline-secondary">Cari</button>
            </form>
            <a href="<?= BASE_URL; ?>/barang/index" class="btn btn-outline-danger">Reset</a>
        </div>
    </div>
    <br>
    <br>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><center>#</center></th>
                <th scope="col"><center>Nama Peminjaman</center></th>
                <th scope="col"><center>Jenis Barang</center></th>
                <th scope="col"><center>No.Barang</center></th>
                <th scope="col"><center>Tanggal Pinjam</center></th>
                <th scope="col"><center>Tanggal Kembali</center></th>
                <th scope="col"><center>Status</center></th>
                <th scope="col"><center>Action</center></th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1?>
            <?php foreach ($data['barang'] as $row) :?>
            <tr>
                <td><center><?=$no; ?></center></td>
                <td><?= ucwords($row['nama_peminjam']);?></td>
                <td><center><?=$row['jenis_barang']; ?></center></td>
                <td><center><?=$row['no_barang']; ?></center></td>
                <td><center><?=$row['tgl_pinjam'];?></center></td>
                <td><center><?=$row['tgl_kembali'];?></center></td>
                <td>
                <?php
                    date_default_timezone_set("Asia/Jakarta");
                    $tgl_kembali = strtotime($row["tgl_kembali"]);
                    $tgl_pinjam = strtotime($row['tgl_pinjam']);
                    $today = strtotime(date('Y-m-d H:i:s'));

                    if ($tgl_kembali <= $today) {
                        echo '<center><span class="badge text-bg-success">Sudah kembali</span></center>'; 
                    ?>
                    <td>
                    <a href="<?= BASE_URL ?>/barang/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');"><i class="bi bi-trash3"></i></a></td>
                    <?php
                    }else {
                        echo '<center><span class="badge text-bg-danger">Belum kembali</span></center>'; ?>
                    <td>
                        <a href="<?= BASE_URL ?>/barang/edit/<?= $row['id'] ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                        <a href="<?= BASE_URL ?>/barang/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');"><i class="bi bi-trash3"></i></a></a>
                    </td>
                    <?php } ?>
                </td>
            </tr>
            <?php $no++; endforeach;?>
        </tbody>
    </table>
</div>