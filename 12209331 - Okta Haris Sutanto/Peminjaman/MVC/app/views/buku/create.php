
<div class="container">
  <h3 class="mb-3">Tambah Peminjam</h3>
  <form action="<?= BASE_URL; ?>/buku/simpanbuku" method="post">
    <div class="form-group mb-3">
      <label for="">Nama Peminjam : </label>
      <input type="text" class="form-control" name="nama_peminjam">
    </div>
<div class="form-group mb-3">
    <label for="">Jenis Barang : </label>
    <select class="form-select" name="jenis_barang">
      <option value="" disabled hidden selected>- - - Pilih Jenis Barang - - -</option>
      <option value="Laptop">Laptop</option>
      <option value="HP">HP</option>
      <option value="AdaptorLAN">AdaptorLAN</option>
    </select>
</div>
    <div class="form-group mb-3">
      <label for="">No Barang : </label>
      <input type="number" class="form-control" name="no_barang">
    </div>
    <div class="form-group mb-3">
      <label for="">Tanggal Pinjam : </label>
      <input type="datetime-local" class="form-control" name="tgl_pinjam">
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>