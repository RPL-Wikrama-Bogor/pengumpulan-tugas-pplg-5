<div class="container">
    <h3 class="mb-3">Edit Peminjaman : <?= $data['peminjaman']['no_barang'] ?></h3>
    <form action="<?= BASE_URL; ?>/peminjaman/updatePeminjaman" method="POST">
        <div class="class-body">
            <input type="hidden" name="id" value="<?= $data['peminjaman']['id']; ?>">
            <div class="form-group mb-3">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $data['peminjaman']['nama_peminjam'] ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="jenis_barang">Jenis Barang</label>
                <select class="form-control form-control-select" name="jenis_barang" id="jenis_barang" required>
                    <option value="Laptop" <?= $data['peminjaman']['jenis_barang'] == 'Laptop' ? 'selected' : null ?>>Laptop</option>
                    <option value="HP" <?= $data['peminjaman']['jenis_barang'] == 'HP' ? 'selected' : null ?>>HP</option>
                    <option value="Adaptor LAN" <?= $data['peminjaman']['jenis_barang'] == 'Adaptor LAN' ? 'selected' : null ?>>Adaptor LAN</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="no_barang">No Barang</label>
                <input type="number" class="form-control" id="no_barang" name="no_barang" value="<?= $data['peminjaman']['no_barang'] ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $data['peminjaman']['tgl_pinjam'] ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="tgl_kembali">Tanggal Kembali</label>
                <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>