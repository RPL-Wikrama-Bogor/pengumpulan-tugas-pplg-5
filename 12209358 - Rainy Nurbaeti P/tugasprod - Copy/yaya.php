<?php

    if( isset($_POST['submit'])){
        if($tambah($_POST) > 0 ){
            echo "
                <script>
                    alert('Data Anda Berhasil Dimasukkan');
                    document.location.href = 'index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data Anda Gagal Dimasukan');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        img{
          
             width: 50%;
             height: 400px;
             float: right;
             margin: 6px;


        }
        button{
        float: right;
        background-color: bisque;
        border-radius: 6px;
       }
       .kolom{
        width: 60%;
        height: 60%;
        background-color: yellow;
        margin: 20px;
        box-sizing: border-box;
        float: left;
        padding: 3px;
        text-align: center;
        }
        .baris{
        display: flex;
        justify-content: center;
        margin-top: 300px;
        }

    </style>
    <title>Contoh</title>
</head>
<body>

    <button>Administrator</button>
    <br><br>
    <img src="ra.png" alt="">

    <h3>Pengaduan Masyarakat</h3>
    <ol>1. bla bla bla</ol>
    <ol>2. bla bla bla</ol>
    <ol>3. bla bla bla</ol>

  <div class="baris">
	   <div class="kolom"><h2>Jumlah Kecamatan</h2><p>15</p></div>
	   <div class="kolom"><h2>Jumlah Desa </h2><p>25</p></div>
	   <div class="kolom"><h2>Jumlah Penduduk</h2><p>12.000</p></div>
	   <div class="kolom"><h2>Data Tahun</h2><p>2023</p></div>
</div>
  <br><br>



  <ul>
        <div class="d-flex justify-content-center">
        <div class="card" style="width: 30rem;">
        <div class ="card-body">
          <div class="h3">
            <h3>Masukkan Data</h3>
          </div>
          <div class="table">
    <div class="mb-3">
        <label class="form-label">NIK :</label><br>
        <input type="text" class="form-control" name="nama">
        </div>
    <div class="mb-3">
        <label class="form-label">Nama Lengkap :</label><br>
        <input type="text" class="form-control" name="nis">
        <div id="emailHelp" class="form-text"></div>
        </div>
    <div class="mb-3">
        <label class="form-label">No Tlp :</label><br>
        <input type="text" class="form-control" name="rombel">
        </div>
    <div class="mb-3">
        <label class="form-label">Pengaduan :</label><br>
        <input type="text" class="form-control" name="rayon">
        </div>
    <div class="mb-3">
        <label class="form-label">Gambar :</label>
        <input type="file" class="form-control" name="gambar">
        </div>
       </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </ul>

</body>
</html>