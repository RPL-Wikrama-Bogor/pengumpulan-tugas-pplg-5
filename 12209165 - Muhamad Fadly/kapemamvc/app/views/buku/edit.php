
<div class="container">
<h3 class="mb-3">Edit Buku: <?= $data['buku']['jenis_barang'] ?></h3>
<form action="<?= BASE_URL; ?>/buku/updateBuku" method="post">
<div class="class-body">
<input type="hidden" name="id" value="<?= $data['buku']['id']; ?>">
<div class="form-group mb-3">
<label for="nama_peminjaman">nama barang</label>
<input type="text" class="form-control" id="nama_peminjaman" name="nama_peminjaman" value="<?= $data['buku']['nama_peminjaman'] ?>">
</div>
<div class="form-group mb-3">
                <label for="jenis_barang">Jenis barang</label>  
                <select class="form-control" name="jenis_barang" id="jenis_barang">
                    <option selected disabled>pilih </option>
                    <option value="Laptop" <?php if ($data['buku']['jenis_barang'] == 'Laptop') echo 'selected'; ?>>Laptop</option>
                    <option value="HP" <?php if ($data['buku']['jenis_barang'] == 'HP') echo 'selected'; ?>>HP</option>
                    <option value="Adaptor LAN" <?php if ($data['buku']['jenis_barang'] == 'Adaptor LAN') echo 'selected'; ?>>Adaptor LAN</option>
                    
                </select>
            </div>
<div class="form-group mb-3">
<label for="tgl_pinjam">Tanggal pinjam</label>
<input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $data['buku']['tgl_pinjam'] ?>">
</div>
<div class="form-group mb-3">
<label for="tgl_kembali">Tanggal kembali</label>
<input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= $data['buku']['tgl_kembali'] ?>">
</div>
</div>
<div class="card-footer">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>