<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/task11.css">
</head>
<body>
    <div class="form">
    <form  action="#" method="post">
        <div class="title">Welcome<br><span>Silahkan Masukan Nomer Pegawai</span></div>
        <input class="input" type="number" name="nopeg" id="" placeholder="22505197803"  minlength="11" maxlength="11"  required> <br><Br>
        <input class="button-confirm" type="submit" value="submit">
    </form>

<?php
    if ($_SERVER ['REQUEST_METHOD'] == "POST") {
        $no_pgw = $_POST ['nopeg'] ;

    // Fungsi untuk mengonversi kode bulan menjadi nama bulan
    function getMonthName($monthCode) {
    $months = array(
        "01" => "Januari",
        "02" => "Februari",
        "03" => "Maret",
        "04" => "April",
        "05" => "Mei",
        "06" => "Juni",
        "07" => "Juli",
        "08" => "Agustus",
        "09" => "September",
        "10" => "Oktober",
        "11" => "November",
        "12" => "Desember"
    );

    return isset($months[$monthCode]) ? $months[$monthCode] : "Bulan Tidak Valid";
    }
    // Memastikan input memiliki 11 angka
    if (strlen($no_pgw) == 11) {
        // Mengambil komponen-komponen dari nomor pegawai
        $golongan = $no_pgw[0];
        $tanggal = substr($no_pgw, 1, 2);
        $bulan = substr($no_pgw, 3, 2);
        $tahun = substr($no_pgw, 5, 4);
        $nomorUrut = substr($no_pgw, 9, 2);

        // Mengonversi kode bulan menjadi nama bulan
        // Buat fungsi getMonthName seperti yang dijelaskan sebelumnya

        $bulanLahir = getMonthName($bulan);
        ?>
   

        <div class="coba">
        <h3>
        <?php
         echo "Data Pegawai<br><br>" ;
        ?>
        </h3>
       
        <?php
        echo "Nomor Golongan: 0$golongan<br>";
        echo "Tanggal Lahir: $tanggal $bulanLahir $tahun<br>";
        echo "Nomor Urut: $nomorUrut";
        ?>
        </div>
    <?php
    } else {
    ?>
    <div class="error-message"> 
        <?php echo "Nomor Pegawai harus memiliki 11 angka.";?>
    </div>  
<?php
    }
    }
?>
</div>
</body>
</html>