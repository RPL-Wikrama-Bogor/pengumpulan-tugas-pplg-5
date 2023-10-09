<div class="container">
    <h3 class="mb-3">Edit Buku: <?= $data['buku']['nama_peminjam']?></h3>
    <form action="<?= BASE_URL; ?>/buku/updateBuku" method="post">
        <div class="class-body">
            <input type="hidden" name="id" value="<?= $data['buku']['id'];?>">
            <div class="form-group mb-3">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input type="text" class="form-control" name="nama_peminjam" id="nama_peminjaman    "
                    value="<?= $data['buku']['nama_peminjam']?>">
            </div>
            <div class="form-group mb-3">
                <label for="jenis_barang">jenis</label>
                <select class="form-control" name="jenis_barang" id="jenis_barang" hiddenoption>
                    <option value="lenovo">Lenovo</option>
                    <option value="asus">Asus</option>
                    <option value="acer">Acer</option>
                    <option value="legion">Legion</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="no_barang">Nomor Barang</label>
                <input type="number" class="form-control" name="no_barang" id="no_barang"
                    value="<?= $data['buku']['no_barang']?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input type="date" class="form-control" name="tgl_pinjam" id="tgl_pinjam"
                    value="<?= $data['buku']['tgl_pinjam']?>">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>