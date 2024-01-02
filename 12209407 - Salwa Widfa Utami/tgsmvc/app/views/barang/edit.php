<div class="container">
    <h3 class="mb-3">Edit Buku : <?= $data['barang']['nama_peminjam']?></h3>
    <form action="<?= BASE_URL; ?>/barang/update" method="post">
        <div class="class-body">
            <input type="hidden" name="id" value="<?= $data['barang']['id'];?>">
            <div class="form-group mb-3">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $data['barang']['nama_peminjam']?>">
            </div>
            <div class="form-group mb-3">
                <label for="jenis_barang">Jenis Barang : </label>
                <select class="form-control" name="jenis_barang">
                <option value="" disabled hidden>- - - Pilih Jenis Barang - - -</option>
                <option value="Laptop" <?php if ($data['barang']['jenis_barang'] == 'Laptop') echo 'selected'; ?>>Laptop</option>
                <option value="HP" <?php if ($data['barang']['jenis_barang'] == 'HP') echo 'selected'; ?>>HP</option>
                <option value="AdaptorLAN" <?php if ($data['barang']['jenis_barang'] == 'AdaptorLAN') echo 'selected'; ?>>AdaptorLAN</option>
                </select> 
                </div>
            <div class="form-group mb-3">
                <label for="no_barang">No Barang</label>
                <input type="text" class="form-control" id="no_barang" name="no_barang" value="<?= $data['barang']['no_barang']?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pinjam">Tanggal Pinjaman</label>
                <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $data['barang']['tgl_pinjam']?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_selesai">Tanggal Kembali</label>
                <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= $data['barang']['tgl_kembali']?>">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class=" btn btn-primary">Submit</button>
        </div>
    </form>
</div>