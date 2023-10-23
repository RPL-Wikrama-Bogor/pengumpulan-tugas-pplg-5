<div class="container">
    <h3 class="mb-3">Edit Peminjaman Milik <?= $data['barang'] ['nama_peminjam']?></h3>
    <form action="<?= BASE_URL; ?>/barang/updateBarang" method="post">
        <div class="class-body">
            <input type="hidden" name="id" value="<?= $data['barang']['id']; ?>">
            <div class="form-group mb-3">
                <label for="judul">Nama Peminjaman</label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $data['barang']['nama_peminjam'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="judul">Jenis Barang</label>
                <select name="jenis_barang" class="form-select" aria-label="Default select example">
                    <option disable hidden selected><?= $data['barang']['jenis_barang'] ?></option>
                    <option value="Laptop">Laptop</option>
                    <option value="HP">HP</option>
                    <option value="Adaptor LAN">Adaptor LAN</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="judul">Nomer Barang</label>
                <input type="number" class="form-control" id="no_barang" name="no_barang" value="<?= $data['barang']['no_barang'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="judul">Tanggal Pinjam</label>
                <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $data['barang']['tgl_pinjam'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="judul">Tanggal Kembali</label>
                <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= $data['barang']['tgl_kembali'] ?>">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>