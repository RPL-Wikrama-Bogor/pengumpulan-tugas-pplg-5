<div class="container">
    <h3 class="mb-3">Edit Peminjaman : <?= $data['buku']['jenis_barang'] ?></h3>
    <form action="<?= BASE_URL; ?>/buku/updateData" method="post">
    <input type="hidden" name="id" autocomplete="off" value="<?= $data['buku']['id'] ?>">
        <div class="class-body">
            <div class="form-group mb-3">
                <label for="nama_peminjaman">Nama Peminjaman<span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="nama_peminjaman" name="nama_peminjam" autocomplete="off" value="<?= $data['buku']['nama_peminjam'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="jenis_barang">Jenis Barang<span style="color: red;">*</span></label>
                <select name="jenis_barang" id="jenis_barang" class="form-select" name="barang">
                    <option hidden disabled selected>Pilih</option>
                    <option value="Laptop" <?php if ($data['buku']['jenis_barang'] == 'Laptop') echo 'selected'; ?>>Laptop</option>
                    <option value="HP" <?php if ($data['buku']['jenis_barang'] == 'HP') echo 'selected'; ?>>HP</option>
                    <option value="Adaptor LAN" <?php if ($data['buku']['jenis_barang'] == 'Adaptor LAN') echo 'selected'; ?>>Adaptor LAN</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="no_barang">Nomor Barang<span style="color: red;">*</span></label>
                <input type="number" class="form-control" id="no_barang" name="no_barang" value="<?= $data['buku']['no_barang'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_selesai">Tanggal Pinjam<span style="color: red;">*</span></label>
                <input type="datetime-local" class="form-control" id="tgl_selesai" name="tgl_pinjam" value="<?= $data['buku']['tgl_pinjam'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_kembali">Tanggal Kembali<span style="color: red;">*</span></label>
                <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= $data['buku']['tgl_kembali'] ?>">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>
</div>