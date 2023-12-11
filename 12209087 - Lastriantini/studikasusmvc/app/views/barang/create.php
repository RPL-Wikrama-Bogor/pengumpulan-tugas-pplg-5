<div class="container">
    <h3 class="mb-3">Tambah Buku</h3>
    <form action="<?= BASE_URL; ?>/barang/simpanbarang" method="post">
        <div class="class-body">
            <div class="form-group mb-3">
                <label>Nama</label>
                <input type="text" class="form-control" id="judul" name="nama_peminjam">
            </div>
            <div class="form-group mb-3">
            <div class="form-group mb-3">
                <label>Jenis Barang</label>
                <select name="jenis_barang" class="form-select" aria-label="Default select example">
                    <option selected disable hidden>Pilih Jenis Barang</option>
                    <option value="Laptop">Laptop</option>
                    <option value="HP">Handphone</option>
                    <option value="Adaptor LAN">Adaptor LAN</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label>No. Barang</label>
                <input type="text" class="form-control" id="penulis" name="no_barang">
            </div>
            <div class="form-group mb-3">
                <label>Tanggal pinjam</label>
                <input type="datetime-local" class="form-control" id="tgl_selesai" name="tgl_pinjam">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</div>