<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card">
        <img class="card-img-top" style="width: 300px" src="<?= BASE_URL ?>/img/<?= $data['gambar'] ?>" alt="...">
            <div class="card-body">
                <h4 class="card-title">Profile Anda</h4>
                <p class="card-text">
                    Nama : <?= $data['nama'] ?>
                    <br>
                    Pekerjaan : <?= $data['pekerjaan'] ?>
                </p>
                <a href="<?= BASE_URL ?>/home/index" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>