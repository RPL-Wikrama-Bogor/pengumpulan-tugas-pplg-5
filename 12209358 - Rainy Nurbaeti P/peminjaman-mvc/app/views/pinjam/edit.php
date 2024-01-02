<!-- Bagian form edit -->
<div class="container">
    <form action="<?= BASE_URL; ?>/pinjam/updatePinjam" method="post">
        <div class="class-body">
            <input type="hidden" name="id" value="<?= $data['pinjam']['id']; ?>">
            <div class="form-group mb-3">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input type="text" class="form-control" name="nama_peminjam" id="nama_peminjam" value="<?= $data['pinjam']['nama_peminjam']; ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="jenis_barang">Jenis Barang</label>
                <input type="text" class="form-control" name="jenis_barang" id="jenis_barang" placeholder="HP,LAPTOP,LAN ADAPTOR" value="<?= $data['pinjam']['jenis_barang']; ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="no_barang">Nomor Barang</label>
                <input type="number" class="form-control" name="no_barang" id="no_barang" value="<?= $data['pinjam']['no_barang']; ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input type="datetime-local" class="form-control" name="tgl_pinjam" id="tgl_pinjam" value="<?= $data['pinjam']['tgl_pinjam']; ?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_kembali">Tanggal Kembali</label>
                <input type="datetime-local" class="form-control" name="tgl_kembali" id="tgl_kembali" required>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>