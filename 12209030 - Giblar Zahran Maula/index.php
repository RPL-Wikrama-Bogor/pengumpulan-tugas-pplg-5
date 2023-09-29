<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   <style>
    .card{
        justify-content:center; 
    }
   </style>

</head>
<body><center>
    <div class="card" style="width:30rem; padding:4rem;">
    
        <h1>Rental Motor</h1>
            
            <form action="" method="post">
                <tr>
                    <td>Masukkan Nama :</td>
                    <td>
                        <input type="text" name="nama" placeholder="Nama" autocomplete="off" required class="form-control" >
                    </td>
                    
                
                </tr>
                <tr>
                <td>Lama waktu rental(per hari) :</td>
                    <td>
                        <input type="number" name="waktu" placeholder="Waktu peminjaman" autocomplete="off" required class="form-control">
                    </td>
                </tr>
                <tr>
                  
                    
                    <label for="jenis">pilih motor  </label>
                        <select name="jenis" required class="form-select">
                            <option value="mio">mio</option>
                            <option value="astrea">astrea</option>
                            <option value="skupi">skupi</option>
                            <option value="vario">vario</option>
                            <option value="supra">supra</option>
                        </select>
                        <br>
                 <button type="submit" value="submit" name="kirim" class="btn btn-dark" style="width:100%;">cetak</button>
            </form>
        
    </center>

    </div> 
      
    <?php
include 'proses.php';
$proses = new Beli();
$proses->setHarga(100000, 600000, 90000, 50000, 100000);
 
if (isset($_POST['kirim'])) {
    $proses->nama = $_POST['nama'];
    $proses->jumlah = $_POST['waktu'];
    $proses->jenis = $_POST['jenis'];
  
    $proses->cetakPembelian();
}
?>
</body>
</html>