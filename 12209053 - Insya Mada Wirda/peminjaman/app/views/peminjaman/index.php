<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>
    <br>

    <div class="d-flex justify-content-between">
        <a href="<?= BASE_URL; ?>/peminjaman/tambah" class="btn btn-primary">Tambah Peminjaman</a>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="<?= $_GET['search'] ?? null ?>">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>

    <br>
    <br>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Peminjam</th>
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
            <?php foreach ($data['peminjaman'] as $row) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['nama_peminjam'] ?></td>
                    <td><?= $row['jenis_barang'] ?></td>
                    <td><?= $row['no_barang'] ?></td>
                    <td><?= $row['tgl_pinjam'] ?></td>
                    <td><?= $row['tgl_kembali'] ? $row['tgl_kembali'] : date('Y-m-d H:i', strtotime("+2 day", strtotime($row['tgl_pinjam']))) ?></td>
                    <td><?= $row['tgl_kembali'] ? '<span class="badge bg-success">Sudah Kembali</span>' : '<span class="badge bg-danger">Belum Kembali</span>' ?></td>
                    <td>
                        <?php if (!$row['tgl_kembali']) { ?>
                            <a href="<?= BASE_URL; ?>/peminjaman/edit/<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                        <?php } ?>
                        <a href="<?= BASE_URL; ?>/peminjaman/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?')">Hapus</a>
                    </td>
                </tr>
            <?php $no++;
            endforeach; ?>
        </tbody>
    </table>
</div>