<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Landing Page/styae.css">
    <title>Landing Page</title>
    <meta http-equiv=”refresh” content=”1″>
</head>

<body>
    <div class="container">
        <a href="index.html">Administrator</a>
    </div>

    <div class="wrap">
        <div class="text">
            <h3>Pengaduan masyarakat</h3>
            <ol>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus illo cumque ullam odit a cum
                    consequuntur corrupti voluptas repellat officiis magnam ipsam ex error, quis molestias, nemo, esse
                    sit maiores?</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor quibusdam dolorum, obcaecati
                    doloribus dolore enim repellat blanditiis placeat, quas velit iusto iste, ab quasi facilis
                    architecto nam incidunt voluptas fuga.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt facilis cupiditate tempore, dicta nisi doloremque molestias. Rerum ratione ipsa explicabo excepturi temporibus sunt repellat voluptatum atque quae eius, alias non.</li>
                <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed veritatis nisi, ipsa molestiae dolor rem!</li>
            </ol>
        </div>
        <div class="gambar">
            <img src="masyarakat.png" alt="">
        </div>
    </div>

    <div class="card">
        <div class="kotak kotak1">
            <h5>Jumlah Kecamatan</h5>
            <p><b>15</b></p>
        </div>
        <div class="kotak">
            <h5>Jumlah desa</h5>
            <p><b>42</b></p>
        </div>
        <div class="kotak">
            <h5>Jumlah Penduduk</h5>
            <p><b>12.000</b></p>
        </div>
        <div class="kotak kotak4">
            <h5>Data Per Tahun</h5>
            <p><b>2023</b></p>
        </div>
    </div>

    <div class="form">
        <form action="" method="post">
            <div class="card1">
                <h1 style="color: black;"><b>Buat Pengaduan</b></h1>
                <div class="card-body">
                    <tr>
                        <td><label>NIK :</label></td><br>
                        <td><input type="number" name="nik"></td>
                        <br>
                    </tr>
                    <tr>
                        <td><label>Nama Lengkap :</label></td><br>

                        <td><input type="text" name="nama_lengkap"></td>
                        <br>
                    </tr>
                    <tr>
                        <td><label>No Telp :</label></td><br>
                        <td><input type="number" name="no_telp"></td>
                        <br>
                    </tr>
                    <tr>
                        <td><label>Pengaduan :</label></td><br>
                        <br>
                        <textarea type="message" name="pengaduan" cols="30" rows="10"></textarea>
                        <br>
                    </tr>
                    <tr>
                        <br>
                        <td><label>Upload Gambar Terkait :</label></td>
                        <td><input type="file" name="gambar" style="color: #000;"></td><br>
                    </tr>
                    <br>
                    <tr>
                        <button type="submit" value="Kirim" name="submit"> <a href="#">Submit</a></button>

                    </tr>
                    <br>
                </div>
            </div>
        </form>

        <div class="content">
            <div class="keterangan">
                <h3>Laporan pengaduan</h3>
                <div class="ket1">
                    <p class="isi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, facilis.</p>
                    <p class="tanggal">3 September 2023: Okta Haris S</p>
                    <img src="sampah.jpg" alt="">
                </div>
                <div class="ket2">
                    <p class="isi">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, facilis.</p>
                    <p class="tanggal">3 September 2023: Okta Haris S</p>
                    <img src="sampah.jpg" alt="">
                </div>
                <footer>
                  <div class="credit">
                    <p>created by <a href="">Okta Haris Sutanto</a>. | &copy; 2023.</p>
                  </div>
                </footer>
            </div>
        </div>
        
</body>

</html>
