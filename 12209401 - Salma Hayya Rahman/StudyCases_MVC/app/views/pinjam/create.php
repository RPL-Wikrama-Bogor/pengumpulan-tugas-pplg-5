<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="container">
    <a href="<?= BASE_URL;?>/Pinjam/index"><i class="fa-solid fa-circle-arrow-left fa-2xl" style="color: #176B87; margin-top:2rem;"></i></a>
    <h3 class="mb-3" style="margin-top: 1rem;">Tambah Peminjaman</h3>
    <form action="<?=BASE_URL;?>/Pinjam/simpanPinjam" method="post">
        <div class="class-body" >
           <div class="form-group mb-3 ">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input type="text" class="form-control " name="nama_peminjam" id="nama_peminjam">    
            </div>
            <div class="form-group mb-3 ">
            <label for="status">Jenis Barang</label>
                <select class="form-control" name="jenis_barang" id="jenis_barang" >
                    <option disabled hidden selected>Pilih Jenis</option>
                    <option value="Laptop" <?= $data['jenis_barang_value'] == 'Laptop' ? 'selected' : '' ?>>Laptop</option>
                    <option value="HP" <?= $data['jenis_barang_value'] == 'HP' ? 'selected' : '' ?>>HP</option>
                    <option value="Adaptor LAN" <?= $data['jenis_barang_value'] == 'Adaptor LAN' ? 'selected' : '' ?>>Adaptor LAN</option>
                </select>
            </div>
           <div class="form-group mb-3 ">
                <label for="nobarang">Nomer Barang</label>
                <input type="number" class="form-control" name="no_barang" id="no_barang">    
            </div>
           <div class="form-group mb-3 ">
                <label for="pinjam">Tanggal Pinjam</label>
                <input type="datetime-local" class="form-control" name="tgl_pinjam" id="tgl_pinjam">    
            </div>
        </div>
        <div class="card-footer" style="float:right;">
            <button type="submit" class="btn  "  style="background-color: #176B87; ">Submit</button>
        </div>
    </form>
</body>
</div>