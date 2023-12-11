<div class="container">
    <h3 class="mb-3">Daftar Pinjaman</h3>
    <div class="d-flex justify-content-between">
        <div>
            <a href="<?= BASE_URL; ?>/buku/tambah" class="btn btn-primary">Peminjaman Laptop</a>
        </div>
        <div class="d-flex">
            <form action="<?= BASE_URL; ?>/buku/cari" method="post" class="d-flex">
                <input type="text" class="form-control" name="search" placeholder="Cari Buku....">
                <button class="btn btn-success" type="submit">Cari</button>

            </form>
            <a href="<?= BASE_URL; ?>/buku/index" class="btn btn-secondary">reset</a>
        </div>
    </div>
    <br><br>
    <table class="table table-success table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">NO</th>
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
            <?php $no=1;?>
            <?php foreach ($data['buku'] as $row) :?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['nama_peminjam']; ?></td>
                <td><?= $row['jenis_barang']; ?></td>
                <td><?= $row['no_barang']; ?></td>
                <td><?= $row['tgl_pinjam']; ?></td>
                <td><?= $row['tgl_kembali']; ?></td>
                <td><?php 
                     $tgl_sekarang = date('Y-m-d H:i:s');
                    if($row['tgl_kembali'] <= $tgl_sekarang){
                       echo "<div style='background-color:green; color:white; border-radius:5px; text-align:center;'>sudah kembali</div>";
                     }else{
                       echo "<div style='background-color:red; color:white; border-radius:7px; text-align:center;'>belum kembali</div>";
                     }
                    ?></td>

                <td>
                    <a href="<?= BASE_URL ?>/buku/edit/<?= $row['id']?>" class="btn btn-primary">Edit</a>
                    <a href="<?= BASE_URL ?>/buku/hapus/<?= $row['id']?>" class="btn btn-danger" onclick="return confirm('Hapus data?');
                    ">Hapus</a>
                </td>
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>
         
    </table>
</div>