<div class="container">
    <h3 class="mb-3">Edit Barang : <?= $data['barang']['nama_peminjam']?></h3>
    <form action="<?= BASE_URL; ?>/barang/updateBarang" method="post">
    <div class="card" style="width: 50rem;">
    <div class="card-body">
    <div class="class-body">
        <input type="hidden" name="id" value="<?= $data['barang']['id'];?>">
        <div class="form-group mb-3">
            <label for="nama_peminjam">Nama Peminjam</label>
            <input type="text" class="form-control" name="nama_peminjam" id="nama_peminjam" value="<?= $data['barang']['nama_peminjam']?>">
        </div>
        <div class="form-group mb-3">
            <label for="jenis_barang">Jenis Barang</label>
            <select name="jenis_barang" class="form-select" aria-label="Default select example">
            <option selected value="<?= $data['barang']['jenis_barang'];?>"><?= $data['barang']['jenis_barang'];?></option>
            <option value="Laptop">Laptop</option>
            <option value="HP">Handphone</option>
            <option value="Adaptor LAN">Adaptor LAN</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="no_barang">No Barang</label>
            <input type="int" class="form-control" name="no_barang" id="no_barang" value="<?= $data['barang']['no_barang']?>">
        </div>
        <div class="form-group mb-3">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="datetime-local" class="form-control" name="tgl_pinjam" id="tgl_pinjam" value="<?= $data['barang']['tgl_pinjam']?>">
        </div>
        <div class="form-group mb-3">
            <label for="tgl_kembali">Tanggal Kembali</label>
            <input type="datetime-local" class="form-control" name="tgl_kembali" id="tgl_kembali" value="<?= $data['barang']['tgl_kembali']?>">
        </div>
    </div>
    
        <button type="submit" class="btn btn-primary"><ion-icon name="paper-plane-outline" style="font-size:20px;"></ion-icon></button>
        <a href="<?= BASE_URL; ?>/barang/index"><h1><ion-icon name="arrow-undo-circle-outline" style="float:right;"></ion-icon></h1></a>
    </div>
</form>
</div>