<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<form action="" method="post">
    <h1>masukan no.pegawai</h1>
     <input type="text" name="no_pegawai" ><br>
    <br><button type="submit" name="submit">submit</button>
    </form>
</body>
</html> -->


<!--  
<?php
if (isset($_POST['submit'])) {
    $no_pegawai;
    $no_golongan;
    $tanggal;
    $bulan;
    $tahun;
    $no_urutan;
    $tanggal_lahir;

    
    $no_pegawai = $_POST['no_pegawai'];
   

    if ( $no_pegawai < 11) {
        echo"no pewgawai tidak sesusai";
    }else{
        
        $no_golongan = substr($no_pegawai)[0.1];
        $tanggal = substr($no_pegawai)[1.2];
        $bulan = substr($no_pegawai)[3.2];
        $tahun = substr($no_pegawai)[5.4];
        $no_urutan = substr($no_pegawai)[9.2];

        if ($bulan=="01") {
            print"januari";
        }elseif ($bulan=="02") {
            print"febuari";
        }elseif ($bulan=="03") {
            print"maret";
        
        }elseif ($bulan=="04") {
            print"april";
        
        }elseif ($bulan=="05") {
            print"mei";
        
        }elseif ($bulan=="06") {
            print"juni";
        
        }elseif ($bulan=="07") {
            print"juli";
        
        }elseif ($bulan=="08") {
            print"agustusr";
        
        }elseif ($bulan=="09") {
            print"september";
        
        }elseif ($bulan=="10") {
            print"oktober";
        
        }elseif ($bulan=="11") {
            print"November";
        
        }else{
            print"Desember";
        }

        $tanggal_lahir = $tanggal.$bulan.$tahun;

        
    }
        echo"no golongan:".$no_golongan;
        echo"Tanggal lahir:".$tanggal_lahir;
        echo"no urut:".$no_urutan;
 }
  ?>  -->


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Pegawai</title>
   
</head>
<body>
    <h1>No.pegawai</h1>
    <form method="POST" action="">
        <tr>
            <td>No Pegawai</td>
            <td><input type="number" value="kode pegawai" name="bilangan"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Submit" name="submit"></td>
        </tr>
    </form>

  -->

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300&family=Roboto:ital,wght@0,400;1,300&family=Varela+Round&display=swap');
*{
    margin: 0;
    padding: 0;
    font-family: 'poppins',sans-serif;
}
section{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    width: 100%;
    background: url(wallpaperflare.com_wallpaper.jpg)no-repeat;
    background-position: center;
    background-size: cover;

}
.form-box{
    position: relative;
    width: 400px;
    height: 450px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    display: flex;
    justify-content: center;
    align-items: center;

}
h2{
    font-size: 2em;
    color: white;
    text-align: center;
}
.inputbox{
    position: relative;
    margin: 30px 0;
    width: 310px;
    border-bottom: 2px solid white;
}
.inputbox label{
    position: absolute;
    top: 50%;
    left: 5px;
    transform: rotateY(-50%);
    color: white;
    font-size: 1em;
    pointer-events: none;
    transition: .5s;
}
input:focus ~ label,
input:valid ~ label{
    top: -5px;
}
.inputbox input{
    width: 100%; 
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    padding: 0 35px 0 5px;
    color: black;
}
.inputbox ion-icon{
    position: absolute;
    right: 8px;
    color: black;
    font-size: 1.2em;
    top: 20px;
}

button{
    width: 100%;
    height: 40px;
    border-radius: 40px;
    background: white;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1em;
    font-weight: 600;
}

table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
            margin-top: 300px;
            color:white;
        }

table, th, td {
            border: 3px solid white;
            padding: 5px;
            text-align: center;
            color:white;
        }
h3{
    color:white;
    font-size: 30px;
    margin-left:50px;
}

    </style>
</head>
<body>
    <section>
    <div class="form-box">
        <div class="foem-value">
            <form action="" method="post">
                <h2>pegawai</h2>
                <?php if(isset($eror)) : ?>
            <i style="color: red; font-style: italic;">Username tidak terdaftar</i>
        <?php endif;?>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="text" required name="pegawai">
                    <label for="">NO.pegawai</label>
                </div>
                <button type="submit" name="submit">submit</button>
            </form>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



    <?php
    if (isset($_POST['submit'])) {
        
        $kodepegawai = $_POST['pegawai'];
        $golongan = substr($kodepegawai, 0, 1);
        $tanggal = substr($kodepegawai, 1, 2);
        $bulan = substr($kodepegawai, 3, 2);
        $tahun = substr($kodepegawai, 5, 4);
        $urutan = substr($kodepegawai, 9, 2);

        if ($kodepegawai < 11) {
            echo "nomor pegawai tidak sesuai";
        } else {
            $nama_bulan = "";

            if ($bulan == "01") {
                $nama_bulan = "Januari";
            } elseif ($bulan == "02") {
                $nama_bulan = "Februari";
            } elseif ($bulan == "03") {
                $nama_bulan = "Maret";
            } elseif ($bulan == "04") {
                $nama_bulan = "April";
            } elseif ($bulan == "05") {
                $nama_bulan = "Mei";
            } elseif ($bulan == "06") {
                $nama_bulan = "Juni";
            } elseif ($bulan == "07") {
                $nama_bulan = "Juli";
            } elseif ($bulan == "08") {
                $nama_bulan = "Agustus";
            } elseif ($bulan == "09") {
                $nama_bulan = "September";
            } elseif ($bulan == "10") {
                $nama_bulan = "Oktober";
            } elseif ($bulan == "11") {
                $nama_bulan = "November";
            } elseif ($bulan == "12") {
                $nama_bulan = "Desember";
            }

            $tanggal_lahir = "$tanggal $nama_bulan $tahun";
            // echo"<div class='muncul'>";
            // echo "Nomor Golongan: $golongan<br>";
            // echo "Tanggal Lahir: $tanggal_lahir <br>";
            // echo "Nomor Urut Pegawai: $urutan<br>";
            // echo "</div>";
        }
    }
    ?>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <h3>Hasil :</h3>
        <table>
            <tr>
                <th>data pegawai</th>
            </tr>
            <tr>
                <td>Golongan</td>
                <td><?php echo $golongan; ?></td>
            </tr>
            <tr>
                <td>Tanggal lahir</td>
                <td><?php echo $tanggal_lahir; ?></td>
            </tr>
            <tr>
                <td>Nomor urut</td>
                <td><?php echo $urutan; ?></td>
            </tr>
        </table>
    <?php } ?>
</section>
</body>
</html>

   