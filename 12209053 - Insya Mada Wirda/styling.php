<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        /* ini biar body html nya gada jarak margin nya */
        body {
            margin: 0;
        }

        /* ini buat kasih jarak dibagian ATAS sebesar 10px */
        .mt-1 {
            margin-top: 10px;
        }

        /* ini buat kasih jarak dibagian ATAS sebesar 30px */
        .mt-3 {
            margin-top: 30px;
        }
        
        /* ini buat kasih jarak dibagian KANAN sebesar 20px */
        .mr-2 {
            margin-right: 20px;
        }
        
        /* ini buat kasih jarak/luas sebesar 10px */
        .p-2 {
            padding: 20px;
        }

        /* ini buat kasih jarak/luas sebesar 1% dari layar */
        .container {
            padding: 1%;
        }

        /* ini biar posisi text nya ditengah */
        .text-center {
            text-align: center;
        }

        /* ini biar posisi text nya dikanan */
        .text-right {
            text-align: right;
        }
        
        /* ini buat hias button/tombol */
        .btn {
            background-color: #fece65;
            border-radius: 50px 50px;
            text-decoration: none;
            padding: 10px 20px;
            border: 0;
            font-weight: bold;
        }
        
        /* ini buat bikin 2 kolom */
        .column-2 {
            float: left;
            width: 50%;
        }

        /* ini buat bikin 4 kolom */
        .column-4 {
            float: left;
            width: 25%;
        }

        .row::after {
            content: "";
            display: table;
            clear: both;
        }

        /* ini buat hias kuning yang besar */
        .img-header {
            width: 110%;
            float: right;
        }
        
        /* ini buat hias bagian jumlah kecamatan/jumlah desa/jumlah penduduk/data pertahun */
        .card-main {
            background-color: #fece65;
            padding: 30px;
            text-align: center;
        }

        /* ini buat hias bagian form pengaduan */
        .form-pengaduan {
            background-color: #f3f3f3;
            padding: 20px;
        }

        /* ini buat hias semua form input */
        .form-input {
            border: 0;
            width: 100%;
            height: 25px;
        }
        
        /* ini buat hias bagian form yang tipenya textarea */
        .form-textarea {
            border: 0;
            width: 100%;
        }

        /* ini buat kasih jarak di laporan pengaduan */
        .laporan-pengaduan {
            padding: 0 20px 0 20px;
        }

        /* ini buat kasih border di bagian form pengaduan (yang ada gambar nari nya) */
        .card-pengaduan {
            width: 100%;
            border: 1px black solid;
        }

        /* ini buat hias gambar nari nya */
        .img-card-pengaduan {
            height: 100px;
            float: right;
        }
        
        /* ini buat footer dipaling bawah */
        .footer {
            position: block;
            width: 100%;
            left: 0;
            bottom: 0;
            color: maroon;
            text-align: center;
            background-color: #fece65;
            padding: 2px 0 2px 0;
        }
        /* responsive css */
        @media only screen and (max-width: 600px) {
            .column-2 {
                width: 100%;
            }
            
            .column-4 {
                width: 100%;
                margin-top: 50px;
            }

            .card-main {
                margin: 0;
                background-color: pink;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-right mt-1">
            <a href="" class="btn">Administrator</a>
        </div>

        <div class="row mt-3">
            <div class="column-2">
                <h2>Pengaduan Masyarakat</h2>
                
                <ol>
                    <li>MADA DISINI, ADA MADA JANGAN LARI !!</li>
                    <li>MADA DISINI, ADA MADA JANGAN LARI !!</li>
                    <li>MADA DISINI, ADA MADA JANGAN LARI !!</li>
                    <li>MADA DISINI, ADA MADA JANGAN LARI !!</li>
                </ol>
            </div>
            
            <div class="column-2">
                <img src="https://wiggly-library-a46.notion.site/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2Fe681035c-4b22-4a22-8c77-78bf5de66009%2FScreen_Shot_2023-02-02_at_10.13.21.png?table=block&id=1fca370a-0015-41e6-8c74-c049c7cf3dfb&spaceId=915c965e-4b46-4d9c-8500-23ab513e5f6b&width=2000&userId=&cache=v2" class="img-header">
            </div>
        </div>

        <div class="row mt-3">
            <div class="column-4">
                <div class="card-main mr-2">
                    <h2>
                        Jumlah Kecamatan
                        <br>
                        1
                    </h2>
                </div>
            </div>
            
            <div class="column-4">
                <div class="card-main mr-2">
                    <h2>
                        Jumlah Desa
                        <br>
                        2
                    </h2>
                </div>
            </div>
            
            <div class="column-4">
                <div class="card-main mr-2">
                    <h2>
                        Jumlah Penduduk
                        <br>
                        3
                    </h2>
                </div>
            </div>
            
            <div class="column-4">
                <div class="card-main">
                    <h2>
                        Data per Tahun
                        <br>
                        4
                    </h2>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="column-2">
                <div class="form-pengaduan">
                    <h2 class="text-center">Buat Pengaduan</h2>
                    
                    <form method="post" action="#">
                        <div>
                            <p>NIK :</p>
                            <input type="text" name="" id="" class="form-input">
                        </div>
                        <div>
                            <p>Nama Lengkap :</p>
                            <input type="text" name="" id="" class="form-input">
                        </div>
                        <div>
                            <p>No Telp :</p>
                            <input type="text" name="" id="" class="form-input">
                        </div>
                        <div>
                            <p>Pengaduan :</p>
                            <textarea name="" id="" cols="30" rows="10" class="form-textarea"></textarea>
                        </div>
                        <div>
                            <p>Upload Gambar Terkait :</p>
                            <input type="file" name="" id="">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="column-2">
                <div class="laporan-pengaduan">
                    <h2>Laporan Pengaduan</h2>

                    <div class="card-pengaduan">
                        <div class="p-2">
                            <p class="text-right">22 Agustus 2006 : Insya Mada Wirda</p>

                            <div class="row">
                                <div class="column-2">
                                    <p>MADA DISINI, ADA MADA JANGAN LARI !!</p>
                                </div>
                                <div class="column-2">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQI3Vgmu3--fc-HbatrZ4jFT2tgxFPx6GYkt-i_W7GR4A&s" class="img-card-pengaduan">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column-2">
                <div class="laporan-pengaduan">
                    <div class="card-pengaduan mt-3">
                        <div class="p-2">
                            <p class="text-right">22 Agustus 2006 : Insya Mada Wirda</p>

                            <div class="row">
                                <div class="column-2">
                                    <p>MADA DISINI, ADA MADA JANGAN LARI !!</p>
                                </div>
                                <div class="column-2">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQI3Vgmu3--fc-HbatrZ4jFT2tgxFPx6GYkt-i_W7GR4A&s" class="img-card-pengaduan">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <p>Copyright © 2023</p>
    </div>
</body>
</html>