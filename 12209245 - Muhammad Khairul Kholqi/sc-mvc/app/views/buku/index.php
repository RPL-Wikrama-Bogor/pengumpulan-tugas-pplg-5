<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>
    <div class="d-flex justify-content-between">
        <div>
            <a href="<?= BASE_URL; ?>/buku/tambah" class="btn btn-primary">Tambah Peminjaman</a>
        </div>
        <div class="d-flex">
            <form action="<?= BASE_URL; ?>/buku/cari" method="post" class="d-flex">
                <input style="padding-left: 10px; margin-right: 20px; width: 400px;" type="text" class="fomr-control" name="search" placeholder="Cari buku.." autocomplete="off">
                <button type="submit" class="btn btn-success" style="margin-right: 20px;">Cari</button>
            </form>
            <a href="<?= BASE_URL; ?>/buku/index" class="btn btn-secondary">Reset</a>
        </div>
    </div>
    <br>
    <br>
    <br>
    <table class="table table-light table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Nomor Barang</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
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
  $tglPinjamDitambahkan = date('Y-m-d H:i:s', strtotime($tglPinjam . ' +2 days'));
  echo $tglPinjamDitambahkan;
  ?>
</td>

      <td>
        <?php
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