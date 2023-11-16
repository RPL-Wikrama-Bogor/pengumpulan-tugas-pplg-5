<div class="container">
    <h3 class="mb-3">Tambah Peminjaman</h3>
    <form action="<?= BASE_URL ?>/buku/simpanBarang" method="post">
        <div class="class-body">
            <div class="class-body">
            <div class="form-group mb-3">
                <label for="judul">Nama Peminjaman<span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" autocomplete="off">
            </div>
            <div class="form-group mb-3">
                <label for="jenis_barang">Jenis Barang<span style="color: red;">*</span></label>
                <select name="jenis_barang" id="jenis_barang" class="form-select">
                    <option hidden disabled selected>Pilih</option>
                    <option value="laptop">Laptop</option>
                    <option value="hp">HP</option>
                    <option value="adaptor_lan">Adaptor LAN</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="no_barang">Nomor Barang<span style="color: red;">*</span></label>
                <input type="number" class="form-control" id="no_barang" name="no_barang">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pinjam">Tanggal Pinjam<span style="color: red;">*</span></label>
                <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>
</div>







