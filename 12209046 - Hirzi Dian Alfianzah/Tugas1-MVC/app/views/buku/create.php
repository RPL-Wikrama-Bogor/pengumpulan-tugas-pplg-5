<div class="container">
    <h3 class="mb-3">Tambah Peminjaman</h3>
    <form action="<?= BASE_URL ?>/buku/simpanbuku" method="POST">
        <div class="class-body">
            <div class="form-grup mb-3">
                <label for="judul">Nama Peminjam</label>
                <input type="text" class="form-control" id="judul" name="nama_peminjaman">
            </div>
            <div class="form-grup mb-3">
            <label for="penulis">Jenis Barang</label>
                <select class="form-control" id="jenis_barang" name="jenis_barang">
                    <option value="" disabled hidden selected >------------------------Jenis Barang----------------------------</option>
                    <option value="Laptop">Laptop</option>
                    <option value="LAN">LAN</option>
                    <option value="HP">HP</option>
                </select>

            </div>
            <div class="form-grup mb-3">
                <label for="no_barang">No Barang</label>
                <input type="number" class="form-control" id="no_barang" name="no_barang">
            </div>
            <div class="form-grup mb-3">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input type="datetime-local" class="form-control" id="tgl_peminjaman" name="tgl_pinjam">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>
</div>