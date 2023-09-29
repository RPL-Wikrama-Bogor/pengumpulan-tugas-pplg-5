<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>

    <div class="d-flex justify-content-between">
        <div>
            <a href="<?= BASE_URL; ?>/pinjam/tambah" class="btn btn-primary float-right"><i class="fa-solid fa-plus fa-2xs"></i>  <i class="fa-solid fa-address-card"></i></a>
        </div>
        <div class="d-flex">
            <form action="<?= BASE_URL; ?>/pinjam/cari" method="post" class="d-flex">
                <input type="text" class="form-control" name="search">
                <button type="submit" class="btn btn-outline-secondary"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <a href="<?= BASE_URL; ?>/pinjam/index" class="btn btn-outline-danger"><i class="fa-solid fa-arrows-rotate"></i></a>
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
                        $selisih_hari = floor(($tgl_kembali - $tgl_pinjam) / (60 * 60 * 24));

                        if ($selisih_hari == 0 || $selisih_hari == 1 ){
                        echo '<div style="background-color: #3EC70B; height: 1.7rem; text-align: center; color: white; margin-top: 0.5rem; border-radius: 7px;">Sudah Kembali</div>';
                        } elseif ($selisih_hari > 2) {
                            echo '<div style="background-color: black; height: 1.7rem; text-align: center; color: white; margin-top: 0.5rem; border-radius: 7px;">Telat Dikembalikan !!! </div>';
                        } 
                        else {
                            echo '<div style="background-color: red; height: 1.7rem; text-align: center; color: white; margin-top: 0.5rem; border-radius: 7px;">Belum Kembali</div>';
                        }
                    ?>
                  </td> 
                  <td> 
                    <?php
                        $tgl_kembali = strtotime($row["tgl_kembali"]);
                        $tgl_pinjam = strtotime($row['tgl_pinjam']);
                        $selisih_hari = floor(($tgl_kembali - $tgl_pinjam) / (60 * 60 * 24));

                        if ($selisih_hari == 2 && $selisih_hari >= 2 ) {
                            echo '<a href="' . BASE_URL . '/pinjam/edit/' . $row['id'] . '" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>';
                        }
                    ?>
                        <a href="<?= BASE_URL ?>/pinjam/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php $no++;
            endforeach; ?>
        </tbody>
    </table>
</div>