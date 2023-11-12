

<div class="container">
    <h3 class="mb-3">Tambah Pinjaman</h3>
    <form action="<?=BASE_URL;?>/Pinjam/simpanPinjam" method="post">
        <div class="class-body">
           <div class="form-group mb-3">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input type="text" class="form-control" name="nama_peminjam" id="nama_peminjam" required>    
            </div>
            <div class="form-group mb-3">
                <label for="status">Jenis Barang</label>
                <select class="form-control" name="jenis_barang" id="jenis_barang" required>
                    <option value="Laptop">Laptop</option>
                    <option value="HP">HP</option>
                    <option value="Adaptor LAN">Adaptor LAN</option>
                </select>
            </div>
           <div class="form-group mb-3">
                <label for="nobarang">Nomer Barang</label>
                <input type="number" class="form-control" name="no_barang" id="no_barang" required>    
            </div>
           <div class="form-group mb-3">
                <label for="pinjam">Tanggal Pinjam</label>
                <input type="datetime-local" class="form-control" name="tgl_pinjam" id="tgl_pinjam"required>    
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>