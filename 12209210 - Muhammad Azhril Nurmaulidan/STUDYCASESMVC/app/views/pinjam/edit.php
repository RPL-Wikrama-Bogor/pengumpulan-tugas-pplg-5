<div class="container">
    <h3 class="mb-3">Edit Peminjaman : <?= $data['pinjam']['nama']; ?></h3>
    <form action="<?= BASE_URL; ?>/pinjam/updatePinjam" method="post">
        <div class="class-body">
            <input type="hidden" name="id" value="<?= $data['pinjam']['id']; ?>">
            <div class="form-group mb-3">
                <label for="nama">Nama Peminjam</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['pinjam']['nama']; ?>">
            </div>
            <div class="form-group mb-3">
                <label for="jenis_barang">Jenis Barang</label>
                <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" value="<?= $data['pinjam']['jenis_barang']; ?>" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="no_barang">Nomor Barang</label>
                <input type="text" class="form-control" id="no_barang" name="no_barang" value="<?= $data['pinjam']['no_barang']; ?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pinjam">Tanggal Peminjaman</label>
                <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= date('Y-m-d\TH:i', strtotime($data['pinjam']['tgl_pinjam'])); ?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_kembali">Tanggal Pengembalian</label>
                <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= date('Y-m-d\TH:i', strtotime($data['pinjam']['tgl_kembali'])); ?>">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>