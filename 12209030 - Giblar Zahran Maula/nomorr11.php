<!DOCTYPE html>
<html>
<head>
    <title>Cetak Informasi Pegawai</title>
</head>
<style>
    body {
        font-family: 'Roboto', sans-serif;
    }

    .card {
        border: 1px solid #darkred;
        width: 20rem;
        height: 30rem;
        padding: 5rem;
        border-radius: 20px;
    }

    .card input {
        margin-top: 1rem;
        margin-bottom: 2rem;
        height: 3rem;
        border-radius: 10px;
        padding-left: 10px;
        background-color: #D2D2D2;
        outline: none;
        border: none;
        width: 100%;
        font-size: 20px;
    }

    .card button {
        height: 3rem;
        border-radius: 10px;
        font-size: 20px;
        color: white;
        background-color: black;
        border: none;
        width: 100%;
    }

    /* CSS untuk alert */
    .alert {
        background-color: #f44336;
        color: white;
        padding: 15px;
        margin-top: 20px;
        border-radius: 10px;
        display: none; 
    }
</style>

<body>
    <center>
        <div class="card">
            <h1>Cetak Informasi Pegawai</h1>

            <form method="post" action="">
                <label for="pegawai_code">Masukkan Kode Pegawai:</label>
                <input type="text" id="pegawai_code" name="pegawai_code" required class="form-control">
                <button type="submit" value="Cetak Informasi" class="">cari</button>
            </form>

           
            <div class="alert" id="alert">
                Kode tidak ditemukan
            </div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
               
                $pegawai_code = $_POST["pegawai_code"];

                
                if (preg_match("/^[1-4]\d{8}\d{2}$/", $pegawai_code)) {
                   
                    $golongan = substr($pegawai_code, 0, 1);
                    $tanggal_lahir = substr($pegawai_code, 1, 2);
                    $bulan_lahir = substr($pegawai_code, 3, 2);
                    $tahun_lahir = substr($pegawai_code, 5, 4);
                    $nomor_urut = substr($pegawai_code, 9, 2);

                    
                    $nama_bulan = date("M", strtotime("$tahun_lahir-$bulan_lahir-$tanggal_lahir"));

                    // Cetak informasi
                    echo "<h2>Informasi Pegawai:</h2>";
                    echo "<p>Nomor Golongan: $golongan</p>";
                    echo "<p>Tanggal Lahir: $tanggal_lahir $nama_bulan $tahun_lahir</p>";
                    echo "<p>Nomor Urut: $nomor_urut</p>";
                } else {
                   
                    echo "<script>document.getElementById('alert').style.display = 'block';</script>";
                }
            }
            ?>
        </div>
    </center>
</body>
</html>
