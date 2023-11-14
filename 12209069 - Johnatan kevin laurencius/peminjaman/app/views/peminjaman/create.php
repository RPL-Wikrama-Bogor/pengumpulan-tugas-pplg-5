<div class="container">
    <h3 class="mb-3">Tambah Peminjaman</h3>
    <form action="<?= BASE_URL; ?>/peminjaman/simpanpinjam" method="post">
        <div class="class-body">
            <div class="form-group mb-3">
                <label for="nama_peminjam">Nama</label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $data['nama_peminjam_value'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="jenis_barang">Jenis Barang</label>
                <select name="jenis_barang" id="jenis_barang" class="form-control">
                    <option disabled hidden selected>---Pilih Jenis Barang---</option>
                    <option value="Laptop" <?= $data['jenis_barang_value'] == 'Laptop' ? 'selected' : '' ?>>Laptop</option>
                    <option value="HP" <?= $data['jenis_barang_value'] == 'HP' ? 'selected' : '' ?>>HP</option>
                    <option value="Adaptor" <?= $data['jenis_barang_value'] == 'Adaptor' ? 'selected' : '' ?>>Adaptor</option>
                    <option value="LAN" <?= $data['jenis_barang_value'] == 'LAN' ? 'selected' : '' ?>>LAN</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="no_barang">Nomor Barang</label>
                <input type="number" class="form-control" id="no_barang" name="no_barang" value="<?= $data['no_barang_value'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pinjam">Tanggal Peminjaman</label>
                <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $data['tgl_pinjam_value'] ?>">
            </div>
            <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" hidden>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>