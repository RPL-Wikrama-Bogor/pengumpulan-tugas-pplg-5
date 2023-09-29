<div class="container">
    <h3 class="mb-3">Edit Buku : <?= $data['buku']['nama_peminjam'] ?></h3> 
    <form action="<?= BASE_URL ?>/buku/updatebuku" method="post">
    <div class="class-body">
        <input type="hidden" name="id" value="<?= $data['buku']['id']; ?>">
        <div class="form-group mb-3">
            <label for="nama_peminjam ">nama</label>
            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $data['buku']['nama_peminjam'] ?>"> 
    </div>
    <div class="form-group mb-3">
                <label for="jenis_barang">jenis</label>
                <select class="form-control" name="jenis_barang" id="jenis_barang" hiddenoption>
                    <option value="lenovo">Lenovo</option>
                    <option value="asus">Asus</option>
                    <option value="acer">Acer</option>
                </select>
            </div>
<div class="form-group mb-3">
    <label for="no_barang ">Nomer barang</label>
    <input type="number" class="form-control" id="no_barang" name="no_barang" value="<?= $data['buku']['no_barang'] ?>">
</div>
<div class="form-group mb-3">
    <label for="tgl_pinjam ">Tanggal pinjam</label>
    <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $data['buku']['tgl_pinjam'] ?>">
</div>
<div class="form-group mb-3">
    <label for="tgl_kembali ">Tanggal kembali</label>
    <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= $data['buku']['tgl_kembali'] ?>">
</div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>

        </div>
    </form>
</div>