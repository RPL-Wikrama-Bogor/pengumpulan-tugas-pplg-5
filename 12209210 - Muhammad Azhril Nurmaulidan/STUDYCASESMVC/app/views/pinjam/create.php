<div class="container">
    <h3 class="mb-3">Tambah Peminjaman</h3>
    <form action="<?= BASE_URL; ?>/pinjam/tambahPinjam" method="post">
        <div class="class-body">
            <div class="form-group mb-3">
                <label for="nama">Nama Peminjam</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group mb-3">
                <label for="jenis_barang">Jenis Barang</label>
                <select class="form-control" id="jenis_barang" name="jenis_barang" required>
                    <option hidden>Pilih Barang</option>
                    <option value="Laptop">Laptop</option>
                    <option value="HP">HP</option>
                    <option value="Adaptor">Adaptor</option>
                    <option value="LAN">LAN</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="no_barang">Nomor Barang</label>
                <input type="text" class="form-control" id="no_barang" name="no_barang" required>
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" required>
            </div>
            <div class="form-group mb-3">
                <label for="tgl_kembali">Tanggal Pengembalian</label>
                <?php
                // Tambahkan kode PHP untuk menghitung tanggal kembali otomatis (tambahkan 2 hari)
                $tgl_pinjam_default = date('Y-m-d\TH:i', strtotime('+2 days'));
                ?>
                <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= $tgl_pinjam_default; ?>" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>