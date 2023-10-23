<div class="container">
    <h3 class="mb-3">Pinjam</h3>
    <form action="<?= BASE_URL; ?>/pinjam/simpanpinjam" method="post" >
        <div class="class-body">
            <div class="form-group mb-3">
                <label for="judul">Nama Peminjam</label>
                <input type="text" class="form-control" name="nama_peminjam" value="<?= $data['nama_peminjam_value'] ?>"> 
            </div>
            <div class="form-group mb-3">
                <label for="status">Jenis Barang</label>
                <select class="form-control" name="jenis_barang" id="jenis_barang" >
                    <option disabled hidden selected>Pilih Jenis</option>
                    <option value="Laptop" <?= $data['jenis_barang_value'] == 'Laptop' ? 'selected' : '' ?>>Laptop</option>
                    <option value="HP" <?= $data['jenis_barang_value'] == 'HP' ? 'selected' : '' ?>>HP</option>
                    <option value="Adaptor LAN" <?= $data['jenis_barang_value'] == 'Adaptor LAN' ? 'selected' : '' ?>>Adaptor LAN</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="tgl_selesai">No Barang</label>
                <input type="number" class="form-control" name="no_barang" id="no_barang" value="<?= $data['no_barang_value'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_selesai">tanggal pinjam</label>
                <input type="datetime-local" class="form-control" name="tgl_pinjam" id="tgl_pinjam" value="<?= $data['tgl_pinjam_value'] ?>">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>