<div class="container mt-5">



        <div class="container mt-5">


        
        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahPeminjamanModal">Tambah Peminjaman</button>

        <table class="table table-bordered table-striped table-light">
            <thead class="thead-dark">
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="tambahPeminjamanModal" tabindex="-1" role="dialog" aria-labelledby="tambahPeminjamanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPeminjamanModalLabel">Tambah Peminjaman</h5>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?=BASE_URL?>/home/tambah" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="namaPeminjam" placeholder="Nama Peminjam" name="nama_peminjam">
                            <input type="text" hidden class="form-control" id="namaPeminjam" placeholder="Nama Peminjam" name="status" value="belom">
                        </div> <br><br>
                        <div class="form-group">
                            <select name="jenis_barang" id="" class="form-control">
                                <option value="Laptop">Laptop</option>
                                <option value="HP">HP</option>
                                <option value="AdaptorLan">Adaptor</option>
                            </select>
                        </div> <br><br>
                        <div class="form-group">
                            <input type="number" class="form-control" id="nomorBarang" placeholder="Nomor Barang" name="no_barang">
                        </div> <br><br>
                        <div class="form-group">
                            <input type="datetime-local" class="form-control" id="tglPinjam" name="tgl_pinjam">
                            <input type="datetime-local" class="form-control" hidden  name="tgl_kembali">
                        </div> <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success" >gass</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <form action="<?= BASE_URL; ?>/home/cari" method="post" class="d-flex">
                <input type="text" class="form-control" name="search" placeholder="Cari Buku....">
                <button class="btn btn-success" type="submit">Cari</button>
               <a href="<?= BASE_URL; ?>/home"><button class="btn btn-warning ms-2" type="submit">reset</button></a> 
        
            </form>
            <br>
            

<table class="table table-bordered table-striped table-light">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>nama</th>
            <th>Jenis Barang</th>
            <th>Nomor Barang</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach( $data['pinjam'] as $row): ?>
        <?php if ($row['status'] == 'sudah'):?>
    
            
                <td><?=$row['id'] ?></td>
            <td><?=$row['nama_peminjam'] ?></td>
            <td><?=$row['jenis_barang'] ?></td>
            <td><?=$row['no_barang'] ?></td>
            <td><?=$row['tgl_pinjam'] ?></td>
            <td><?=$row['tgl_kembali'] ?></td>
            <td><?=$row['status'] ?></td>
            
            
       
            <td>
               <a href="<?=BASE_URL?>/home/hapus/<?=$row['id']?>" onclick="return confirm('yakin ni?')"><button class="btn btn-danger action-button" >Hapus</button></a> 
            </td>
            <?php else: ?>
                     
                <td><?=$row['id'] ?></td>
            <td><?=$row['nama_peminjam'] ?></td>
            <td><?=$row['jenis_barang'] ?></td>
            <td><?=$row['no_barang'] ?></td>
            <td><?=$row['tgl_pinjam'] ?></td>
            <td><?=$row['tgl_kembali'] ?></td>
            <td><?=$row['status'] ?></td>
            
            
       
            <td>
                <a href="<?=BASE_URL?>/home/edit/<?=$row['id']?>"><button class="btn btn-primary action-button" data-toggle="modal" data-target="#updatePeminjamanModal">Edit</button></a>
               <a href="<?=BASE_URL?>/home/hapus/<?=$row['id']?>" onclick="return confirm('yakin ni?')"><button class="btn btn-danger action-button" >Hapus</button></a> 
            </td>
            <?php endif; ?>
            
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>