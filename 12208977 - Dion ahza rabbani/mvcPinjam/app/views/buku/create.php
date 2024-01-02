<div class="container">
    <h3 class="mb-3">isi formulir</h3>
    <form action="<?= BASE_URL; ?>/buku/simpanbuku" method="post">
        <div class="class-body">
            <div class="form-group mb-3">
                <label for="judul ">nama</label>
                <input type="text" class="form-control" id="judul" name="nama_peminjam">
            </div>  
            <div class="form-group mb-3">
                <label for="jenis_barang">jenis</label>
                <select class="form-control" name="jenis_barang" id="jenis_barang" hiddenoption>
                    <option value="Lenovo">Lenovo</option>
                    <option value="Asus">Asus</option>
                    <option value="Acer">Acer</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="tgl_selesai">nomer </label>
                <input type="number" class="form-control" id="no_barang" name="no_barang">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_selesai">tanggal pinjam </label>
                <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam">
            </div>
            
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
</div>