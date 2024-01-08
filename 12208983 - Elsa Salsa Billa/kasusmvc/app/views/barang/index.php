<div class="container">
    <br>
    <h3 class="mb-3">Daftar Peminjaman Barang</h3>
    <div class="d-flex justify-content-between">
        <div>
            <a href="<?= BASE_URL; ?>/barang/tambah" class="btn btn-primary">Tambah Peminjaman</a>
        </div>
        <div class="d-flex">
        <form action="<?= BASE_URL ?>/barang/cari" method="post" class="d-flex">
            <input type="text" class="form-control"  name="search" placeholder="Cari Barang...">
            <button type="submit" class="btn btn-outline-primary" ><ion-icon name="search-outline"></ion-icon></button>
        </form>
        <a href="<?= BASE_URL; ?>/barang/index" class="btn btn-outline-danger"><ion-icon name="refresh-outline"></ion-icon></a>
        </div>
    </div>

    <br>
    <table class="table table-success table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">No Barang</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            <?php foreach ($data['barang'] as $row) :?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['nama_peminjam'];?></td>
                <td><?= $row['jenis_barang']; ?></td>
                <td><?= $row['no_barang']; ?></td>
                <td><?= $row['tgl_pinjam'];?></td>
                <td><?= $row['tgl_kembali'];?></td>
                <td>
                <?php
                        $tgl_kembali = strtotime($row["tgl_kembali"]);
                        $tgl_pinjam = strtotime($row['tgl_pinjam']);

                        // Menghitung selisih hari antara tanggal kembali dan tanggal pinjam
                        $selisih_hari = floor(($tgl_kembali - $tgl_pinjam) / (60 * 60 * 24));

                        if ($selisih_hari == 0 || $selisih_hari == 1 ) {
                        $status = "Sudah kembali" ;
                        echo '<div class="btn btn-success"> ' . $status .' </div>';
                        }elseif ( $selisih_hari > 2) {
                        $status = "Sudah kembali" ;
                        echo '<div class="btn btn-warning"> ' . $status .' </div>';
                        } 
                        else {
                        $status = "Belum kembali" ;
                        echo '<div class="btn btn-danger">' . $status .' </div>';
                        }
                    ?>
                  </td> 
                  <td> 
                    <?php
                        if ($status == 'Belum kembali') {
                            // Menampilkan tautan edit hanya jika tanggal kembali bukan pada tanggal yang sama atau 1 hari setelah tanggal peminjaman
                            echo '<a href="' . BASE_URL . '/barang/edit/' . $row['id'] . '" class="btn btn-primary"><ion-icon name="create-outline"></ion-icon></a>';
                        }
                    ?>
                        <a href="<?= BASE_URL ?>/barang/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');"><ion-icon name="trash-outline"></ion-icon></a>
                  </td>
                
            </tr>
            <?php $no++; endforeach;?>
        </tbody>
    </table>
</div>