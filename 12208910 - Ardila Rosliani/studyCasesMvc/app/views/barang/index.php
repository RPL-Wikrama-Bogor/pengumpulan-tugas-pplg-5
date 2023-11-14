<div class="container">
    <h3 class="mb-3">Daftar Pinjaman</h3>
    <div class="d-flex justify-content-between">
        <div>
            <a href="<?= BASE_URL; ?>/barang/tambah" class="btn btn-primary">Tambah Pinjaman</a>
        </div>
        <div class="d-flex">
            <form action="<?= BASE_URL; ?>/barang/cari" method="post" class="d-flex">
            <input type="text" class="form-control" name="search">
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
                <th scope="col">#</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Nomer Barang</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            <?php foreach ($data['barang'] as $row) :?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['nama_peminjam']; ?></td>
                <td><?= $row['jenis_barang']; ?></td>
                <td><?= $row['no_barang']; ?></td>
                <td><?= $row['tgl_pinjam']; ?></td>
                <td><?= $row['tgl_kembali']; ?></td>
                <td>
                    <?php
                    if (date('Y-m-d H:i:s', time() + (60 * 60 * 5)) > $row['tgl_kembali']) {
                        echo '<span class="badge text-bg-success">sudah kembali</span>';
                        // echo date('Y-m-d H:i:s', time() + (60 * 60 * 5)); ?>
                    </td>
                    <td>
                    <a href="<?= BASE_URL ?>/barang/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                    </td>
                    <?php
                    }
                    elseif ($row['status'] == 'sudah kembali') {
                        echo '<span class="badge text-bg-success">sudah kembali</span>'; 
                        // echo date('Y-m-d H:i:s', time() + (60 * 60 * 5)); ?>
                                        
                    </td>
                    <td>
                    <a href="<?= BASE_URL ?>/barang/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                    </td>
                    <?php
                    }else {
                        echo '<span class="badge text-bg-danger">belum kembali</span>';
                        // echo date('Y-m-d H:i:s', time() + (60 * 60 * 5)); ?>
                    <td>
                    <a href="<?= BASE_URL ?>/barang/edit/<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="<?= BASE_URL ?>/barang/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                    </td>
                    <?php
                    }
                    ?>
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>
    </table>
</div>