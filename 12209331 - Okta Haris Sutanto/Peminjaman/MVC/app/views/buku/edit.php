<div class="container">
  <h3 class="mb-3">Edit Buku : <?= $data['buku']['nama_peminjam'] ?></h3>
  <form action="<?= BASE_URL; ?>/buku/updateBuku" method="post">
    <div class="class-body">
      <input type="hidden" name="id" value="<?= $data['buku']['id']; ?>">
      <div class="form-group mb-3">
        <label for="nama_peminjam">Judul : </label>
        <input type="text" class="form-control" name="nama_peminjam" value="<?= $data['buku']['nama_peminjam'] ?>">
      </div>
    <div class="form-group mb-3">
      <label for="jenis_barang">Jenis Barang : </label>
        <select class="form-control" name="jenis_barang">
          <!-- Gak muncul gaje emang -->
          <option value="" disabled hidden>- - - Pilih Jenis Barang - - -</option>
          <option value="Laptop" <?php if ($data['buku']['jenis_barang'] == 'Laptop') echo 'selected'; ?>>Laptop</option>
          <option value="HP" <?php if ($data['buku']['jenis_barang'] == 'HP') echo 'selected'; ?>>HP</option>
          <option value="AdaptorLAN" <?php if ($data['buku']['jenis_barang'] == 'AdaptorLAN') echo 'selected'; ?>>AdaptorLAN</option>
        </select> 
    </div> 
      <div class="form-group mb-3">
        <label for="no_barang">No Barang : </label>
        <input type="text" class="form-control" name="no_barang" value="<?= $data['buku']['no_barang'] ?>">
      </div>
      <div class="form-group mb-3">
          <label for="tgl_pinjam">Tanggal Pinjam:</label>
          <input type="datetime-local" class="form-control" name="tgl_pinjam" value="<?= $data['buku']['tgl_pinjam'] ?>">
     </div>
    <!-- <div class="form-group mb-3">
          <label for="tgl_kembali">Tanggal Kembali:</label>
          <input type="datetime-local" class="form-control" name="tgl_kembali" value="">
     </div> -->
     <div class="form-group mb-3">
        <label for="tgl_kembali">tgl_kembali:</label>
        <input type="datetime-local" class="form-control" name="tgl_kembali" id="tgl_kembali" value="<?= $data['buku']['tgl_kembali'] ?>">
     </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </div>
  </form>
</div>
