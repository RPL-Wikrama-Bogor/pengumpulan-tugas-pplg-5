<div class="container">
    <h3 class="mb-3">Tambah Buku</h3>
    <form action="<?= BASE_URL;?>/buku/simpanbuku" method="post">
        <div class="class-body">
            <div class="form-group mb-3">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input type="text" class="form-control" name="nama_peminjam" id="nama_peminjam">
            </div>
            <div class="form-group mb-3">
                <label for="jenis_barang">jenis</label>
                <select class="form-control" name="jenis_barang" id="jenis_barang" hiddenoption>
                    <option value="lenovo">Lenovo</option>
                    <option value="asus">Asus</option>
                    <option value="acer">Acer</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="no_barang">Nomor Barang</label>
                <input type="number" class="form-control" name="no_barang" id="no_barang">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input type="datetime-local" class="form-control" name="tgl_pinjam" id="tgl_pinjam">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>