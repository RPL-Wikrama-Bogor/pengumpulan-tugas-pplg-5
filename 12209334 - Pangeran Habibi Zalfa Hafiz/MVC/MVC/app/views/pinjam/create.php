<div class="container">
    <h3 class="mb-3">Pinjam</h3>
    <form action="<?= BASE_URL; ?>/pinjam/simpanpinjam" method="post">
        <div class="class-body">
            <div class="form-group mb-3">
                <label for="judul">Nama Peminjam</label>
                <input type="text" class="form-control" name="nama_peminjam" id="nama_peminjam" required>
            </div>
            <div class="form-group mb-3">
                <label for="status">Jenis Barang</label>
                <select class="form-control" name="jenis_barang" id="jenis_barang">
                    <option disable selected >---Jenis barang---</option>
                    <option value="Laptop">Laptop</option>
                    <option value="HP">HP</option>
                    <option value="Adaptor LAN">Adaptor LAN</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="tgl_selesai">No Barang</label>
                <input type="number" class="form-control" name="no_barang" id="no_barang" required>
            </div>
            <div class="form-group mb-3">
                <label for="tgl_selesai">tanggal pinjam</label>
                <input type="datetime-local" class="form-control" name="tgl_pinjam" id="tgl_pinjam" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>