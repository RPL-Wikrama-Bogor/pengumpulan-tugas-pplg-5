<div class="container">
    <h3 class="mb-3">Tambah Peminjaman</h3>
    <form action="<?= BASE_URL; ?>/pinjam/simpanPinjam" method="post">
    <div class="class-body">
        <div class="form-group mb-3">
            <label for="nama_peminjam">Nama Peminjam</label>
            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $data['nama_peminjam_value'] ?>" >
        </div>
        <div class="form-group mb-3">
            <select class="form-select" aria-label="Default select example" name="jenis_barang" id=""   value="<?= $data['jenis_barang_value'] ?>">
                <option selected hidden>Pilih Jenis Barang</option>
                <option value="Laptop">Laptop</option>
                <option value="HP">HP</option>
                <option value="Adaptor">Adaptor</option>
                <option value="LAN">LAN</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="no_barang">Nomer Barang</label>
            <input type="number" class="form-control" id="no_barang" name="no_barang" value="<?= $data['no_barang_value'] ?>" >
        </div>
        <div class="form-group mb-3">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $data['tgl_pinjam_value'] ?>"
        </div>
        <div class="form-group mb-3" hidden>
            <label for="tgl_kembali">Tanggal Selesai</label>
            <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali">
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    
    </form>
</div>