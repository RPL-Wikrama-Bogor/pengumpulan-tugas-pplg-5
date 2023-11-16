<div class="container">
    <h3 class="mb-3">Edit Peminjaman: <?= $data['buku']['jenis_barang'] ?></h3>
    <form action="<?= BASE_URL; ?>/buku/updateBuku" method="post">
        <div class="class-body">
            <input type="hidden" name="id" value="<?= $data['buku']['id']; ?>">
            <div class="form-group mb-3">
                <label for="penulis">Nama Peminjam</label>
                <input type="text" class="form-control" id="penulis" name="nama_peminjaman" value="<?= $data['buku']['nama_peminjaman'] ?>">
            </div>
            <div class="form-group mb-3">
            <label for="penulis">Jenis Barang</label>
                <select class="form-control" id="jenis_barang" name="jenis_barang">
                    <option value="" disabled hidden selected >----------------------------------------------------------------Jenis Barang-----------------------------------------------------------------</option>
                    <option value="Laptop">Laptop</option>
                    <option value="LAN">LAN</option>
                    <option value="HP">HP</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="tgl_selesai">Nomor Barang</label>
                <input type="number" class="form-control" id="no_barang" name="no_barang" value="<?= $data['buku']['no_barang'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_selesai">Tanggal Pinjam</label>
                <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $data['buku']['tgl_pinjam'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_kembali">Tanggal Kembali</label>
                <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= $data['buku']['tgl_kembali'] ?>">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
