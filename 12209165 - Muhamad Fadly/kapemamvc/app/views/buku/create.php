<div class="container">
    <h3 class="mb-3">Tambah Peminjaman</h3>
    <form action="<?= BASE_URL; ?>/buku/simpanbuku" method="post">
        <div class="class-body">
        <?php
            // Periksa apakah ada pesan kesalahan yang harus ditampilkan
            if (isset($data['error_message'])) {
                echo '<div class="alert alert-danger">' . $data['error_message'] . '</div>';
            }
            ?>
            <div class="form-group mb-3">
                <label for="nama_peminjaman">nama peminjam</label>
                <input type="varchar" class="form-control" id="nama_peminjaman" name="nama_peminjaman" value="<?= isset($_POST['nama_peminjaman']) ? $_POST['nama_peminjaman'] : '' ?>">
            </div>
            <div class="form-group mb-3">
                <label for="jenis_barang">Jenis barang</label>  
                <select class="form-control" name="jenis_barang" id="jenis_barang">
                    <option selected disabled>pilih </option>
                    <option value="Laptop" <?= (isset($_POST['jenis_barang']) && $_POST['jenis_barang'] == 'Laptop') ? 'selected' : '' ?>>Laptop</option>
                    <option value="HP" <?= (isset($_POST['jenis_barang']) && $_POST['jenis_barang'] == 'HP') ? 'selected' : '' ?>>HP</option>
                    <option value="Adaptor LAN" <?= (isset($_POST['jenis_barang']) && $_POST['jenis_barang'] == 'Adaptor LAN') ? 'selected' : '' ?>>Adaptor LAN</option>
                </select>
            </div>
            <div class="form-group mb-3">
            <label for="no_barang">no barang</label>
            <input type="number" class="form-control" id="no_barang" name="no_barang" value="<?= isset($_POST['no_barang']) ? $_POST['no_barang'] : '' ?>">
            </div>
            
            <div class="form-group mb-3">
            <label for="tgl_pinjam">Tanggal pinjam</label>
            <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= isset($_POST['tgl_pinjam']) ? $_POST['tgl_pinjam'] : '' ?>">
            </div>
        </div>
<div class="card-footer">
<button type="submit" class="btn btn-primary">Submit</button>
</div>

</form>
</div>
