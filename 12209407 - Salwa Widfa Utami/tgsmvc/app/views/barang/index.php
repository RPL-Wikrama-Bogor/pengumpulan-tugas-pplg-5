<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>
    <div class="d-flex justify-content-between">
    <div>
    <a href="<?= BASE_URL;?>/barang/tambah" class="btn text-white" style="background-color: #053B50;"><i>Tambah Peminjaman</i></a>
    </div>
    <div class="d-flex">
    <form action="<?= BASE_URL;?>/barang/cari" method="post" class= "d-flex" style="margin-right: 0.5rem;">
        <input type="text" name="search" id="" class="form-control" style="border: solid 1px grey; margin-right: -0.1rem" placeholder="Cari...">
        <button type="submit" class="btn btn-succes" style="color: black; border: solid 1px grey;"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <a href="<?= BASE_URL;?>/barang/index" class="btn btn-secondary" style="background-color: white ; color: red; border: solid 1px red;"><i class="fa-solid fa-rotate"></i></a>
    </div>
    </div>
    <br>
    <table class="table table-success table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col" style="text-align: center;">No</th>
                <th scope="col" style="text-align: center;">Nama Peminjam</th>
                <th scope="col" style="text-align: center;">Jenis Barang</th>
                <th scope="col" style="text-align: center;">No Barang</th>
                <th scope="col" style="text-align: center;">Tanggal Pinjam</th>
                <th scope="col" style="text-align: center;">Tanggal Kembali</th>
                <th scope="col" style="text-align: center;">Status</th>
                <th scope="col" style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;?>
            <?php foreach ($data['barang'] as $row) :?>
                <tr>
                  <td><center><?= $no; ?></center></td>  
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

                        if ($selisih_hari == 2 && $selisih_hari >= 2) {
                            // Menampilkan tautan edit hanya jika tanggal kembali bukan pada tanggal yang sama atau 1 hari setelah tanggal peminjaman
                            echo '<a href="' . BASE_URL . '/barang/edit/' . $row['id'] . '" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>';
                        }else
                            // echo echo '<a href="' . BASE_URL . '/barang/edit/' . $row['id'] . '" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>';
                    ?>
                        <a href="<?= BASE_URL ?>/barang/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');"><i class="fa-solid fa-trash"></i></a>
                  </td>
                </tr>
                <?php $no++; endforeach; ?>
        </tbody>
    </table>
</div>

</body>