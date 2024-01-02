<div class="container">
  <h3 class="mb-3">Daftar Buku</h3>
  <br>
  <div class="d-flex justify-content-between">
    <a href="<?= BASE_URL; ?>/buku/tambah" class="btn btn-primary">Tambah Buku</a>
    <div class="d-flex">
      <form action="<?= BASE_URL; ?>/buku/cari" method="post" class="d-flex">
        <input type="text" class="form-control" name="search">
        <button type="submit" class="btn btn-outline-secondary">Cari</button>
      </form>
      <a href="<?= BASE_URL; ?> /buku/index" class="btn btn-outline-danger">Reset</a>
    </div>
  </div>
  <br>
  <table class="table table-light table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Peminjam</th>
        <th scope="col">Jenis Barang</th>
        <th scope="col">Nomor Barang</th>
        <th scope="col">Tanggal Pinjam</th>
        <th scope="col">Tanggal kembali</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
  <?php $no = 1; ?>
  <?php foreach ($data['buku'] as $row) : ?>
    <tr>
      <td><?= $no ?></td>
      <td><?= $row['nama_peminjam'] ?></td>
      <td><?= $row['jenis_barang'] ?></td>
      <td><?= $row['no_barang'] ?></td>
      <td><?= $row['tgl_pinjam'] ?></td>
      <td>
  <?php
  $tglPinjam = $row['tgl_pinjam'];
  // Menggunakan strtotime untuk menambah 2 hari ke tanggal pinjam
  $tglPinjamDitambahkan = date('Y-m-d H:i:s', strtotime($tglPinjam . ' +2 days'));
  echo $tglPinjamDitambahkan;
  ?>
</td>

      <td>
        <?php
        // jadi, misal minjem tanggal 5 terus harus sudah kembali pada tanggal 10 jika sekarang 
        // tanggal 15 maka tampilkan sudah kembali jika sekarang tanggal 8 maka tampilkan belum kembali
        $tglKembali = $tglPinjamDitambahkan;
        $tglSekarang = date('Y-m-d H:i:s');

        if ($tglSekarang > $tglKembali) {
          echo "<div class='alert alert-primary' role='alert'>
          Sudah Kembali!
                  </div>";
        } else {
          echo "<div class='alert alert-danger' role='alert'>
          Belum Kembali!
        </div>";
        }
        ?>
      </td>
      <td><?php
        if($tglSekarang < $tglKembali) {
          echo "<a href='".BASE_URL."/buku/edit/".$row['id']."' class='btn btn-primary'>Edit</a>";
        }
        ?>
        <a href="<?= BASE_URL ?>/buku/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus Data?')">hapus</a>
      </td>
    </tr>
    <?php $no++;
    endforeach; ?>
</tbody>
  </table>
</div>