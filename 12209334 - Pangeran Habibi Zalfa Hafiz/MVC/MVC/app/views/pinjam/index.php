<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>

    <div class="d-flex justify-content-between">
        <div>
            <a href="<?= BASE_URL; ?>/pinjam/tambah" class="btn btn-primary float-right">Tambah Peminjaman</a>
        </div>
        <div class="d-flex">
            <form action="<?= BASE_URL; ?>/pinjam/cari" method="post" class="d-flex">
                <input type="text" class="form-control" name="search">
                <button type="submit" class="btn btn-outline-secondary">Cari</button>
            </form>
            <a href="<?= BASE_URL; ?>/pinjam/index" class="btn btn-outline-danger">reset</a>
        </div>
    </div>


    <br><br>
    <table class="table table-success table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
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
            <?php foreach ($data['pinjam'] as $row) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['nama_peminjam']; ?></td>
                    <td><?= $row['jenis_barang']; ?></td>
                    <td><?= $row['no_barang']; ?></td>
                    <td><?= $row['tgl_pinjam']; ?></td>
                    <td><?= $row['tgl_kembali']; ?></td>
                    <td>
                    <?php
                        $tgl_kembali = strtotime($row["tgl_kembali"]);
                        $tgl_pinjam = strtotime($row['tgl_pinjam']);

                        // Menghitung selisih hari antara tanggal kembali dan tanggal pinjam
                        $selisih_hari = floor(($tgl_kembali - $tgl_pinjam) / (60 * 60 * 24));

                        if ($selisih_hari == 0 || $selisih_hari == 1 || $selisih_hari > 2) {
                        // Jika tanggal kembali adalah pada tanggal yang sama atau 1 hari setelah tanggal peminjaman
                        echo '<div style="background-color: #3EC70B; height: 1.7rem; text-align: center; color: white; margin-top: 0.5rem; border-radius: 7px;">Sudah Kembali</div>';
                        } else {
                            // Jika tidak, maka belum kembali
                        echo '<div style="background-color: red; height: 1.7rem; text-align: center; color: white; margin-top: 0.5rem; border-radius: 7px;">Belum Kembali</div>';
                        }
                    ?>
                  </td> 
                  <td> 
                    <?php
                        $tgl_kembali = strtotime($row["tgl_kembali"]);
                        $tgl_pinjam = strtotime($row['tgl_pinjam']);

                        // Menghitung selisih hari antara tanggal kembali dan tanggal pinjam
                        $selisih_hari = floor(($tgl_kembali - $tgl_pinjam) / (60 * 60 * 24));

                        if ($selisih_hari == 2 && $selisih_hari >= 2  ) {
                            // Menampilkan tautan edit hanya jika tanggal kembali bukan pada tanggal yang sama atau 1 hari setelah tanggal peminjaman
                            echo '<a href="' . BASE_URL . '/pinjam/edit/' . $row['id'] . '" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>edit</a>';
                        }
                    ?>
                        <a href="<?= BASE_URL ?>/pinjam/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                    </td>
                </tr>

            <?php $no++;
            endforeach; ?>
        </tbody>
    </table>
</div>