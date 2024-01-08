<div class="container">
    <h3 class="mb-3">Tambah Peminjaman</h3>
    <form action="<?= BASE_URL; ?>/barang/simpanbarang" method="post">
        <div class="class-body">
            <div class="form-group mb-3">
                <label for="judul">Nama Peminjaman</label>
                <input type="text" class="form-control" id="nama_peminjaman" name="nama_peminjaman">
            </div>
            <div class="form-group mb-3">
                <label for="judul">Jenis Barang</label>
                <select name="jenis_barang" class="form-select" aria-label="Default select example">
                    <option disable hidden selected> ---Pilih---</option>
                    <option value="Laptop">Laptop</option>
                    <option value="HP">HP</option>
                    <option value="Adaptor LAN">Adaptor LAN</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="judul">Nomer Barang</label>
                <input type="number" class="form-control" id="no_barang" name="no_barang">
            </div>
            <div class="form-group mb-3">
                <label for="judul">Tanggal Pinjam</label>
                <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        
    </form>
</div>