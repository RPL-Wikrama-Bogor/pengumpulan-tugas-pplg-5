<div class="container">
  
    <form action="<?= BASE_URL; ?>/home/update" method="post">
    <div class="class-body">
        <input type="hidden" name="id" value="<?= $data['pinjam']['id'];?>">
        <div class="form-group mb-3">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" name="nama_peminjam" id="judul" value="<?= $data['pinjam']['nama_peminjam']?>">
        </div>
        <div class="form-group mb-3">
            <label for="penulis">jenis</label>
            <input type="text" class="form-control" name="jenis_barang" id="penulis" value="<?= $data['pinjam']['jenis_barang']?>">
        </div>
        <div class="form-group mb-3">
            <label for="penulis">no barang</label>
            <input type="text" class="form-control" name="no_barang" id="penulis" value="<?= $data['pinjam']['no_barang']?>">
        </div>
        
        <div class="form-group mb-3">
            <label for="penulis">tanggal minjem</label>
            <input type="datetime-local" class="form-control" name="tgl_pinjam" id="penulis" value="<?= $data['pinjam']['tgl_pinjam']?>">
        </div>
        <div class="form-group mb-3">
            <label for="tgl_selesai">Tanggal kembali</label>
            <input type="datetime-local" class="form-control" name="tgl_kembali" id="tgl_selesai" value="<?= $data['pinjam']['tgl_kembali']?>">
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>