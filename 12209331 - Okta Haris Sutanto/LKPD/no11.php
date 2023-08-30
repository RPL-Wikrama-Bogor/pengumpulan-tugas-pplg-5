<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-color: #f0f0f0;
    background-image: url("city.gif");

  }

  .card {
    width: 50rem; /* Adjusted width */
    background: #07182E;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center; /* Adjusted alignment */
    overflow: hidden;
    border-radius: 20px;
    padding: 20px; /* Added padding */
  }

  .card h1{
    z-index: 1;
    color: white;
    font-size: 2em;
  }

  .card::before {
    content: '';
    position: absolute;
    width: 1000px;
    background-image: linear-gradient(180deg, rgb(0, 183, 255), rgb(255, 48, 255));
    height: 130%;
    animation: rotBGimg 3s linear infinite;
    transition: all 0.2s linear;
  }

  @keyframes rotBGimg {
    from {
      transform: rotate(0deg);
    }

    to {
      transform: rotate(360deg);
    }
  }

  .card::after {
    content: '';
    position: absolute;
    background: #07182E;
    /* filter: blur(25px); */
    inset: 5px;
    border-radius: 15px;
  }

  .card form {
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 2;
  }

  .card label {
    color: white;
    font-weight: bold;
    margin-bottom: 8px;
  }

  .card input[type="text"] {
    width: 80%;
    padding: 8px;
    border: none;
    border-radius: 4px;
    margin-bottom: 10px;
  }

  .card button {
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 8px 16px;
    cursor: pointer;
  }

  .card button:hover {
    background-color: #2980b9;
  }

  /* bagian ul li */
  .card ul {
    margin-top: 20px;
    width: 100%;
    color: white;
  }

  .card li {
    margin-bottom: 8px;
    color: white;
  }

  .card a {
    color: white;
    text-decoration: none;
  }
</style>
</head>
<body>
      <?php
      if(isset($_POST["submit"])) {
        $noPegawai = $_POST['inputnopegawai'];

        $length = strlen($noPegawai);
        if( $length < 11) {
            echo "no pegawai tidak sesuai";
        }
        $G = substr($noPegawai, 0, 1); // Angka satuan
    
        $tanggal = substr($noPegawai, 1, 2);  // Angka tanggal
        $bulan = substr($noPegawai, 3, 2);  // Angka bulan
        $tahun = substr($noPegawai, 5, 4);  // tahun
        $nn = substr($noPegawai, 9, 2);  // identiras

        if( $bulan == "01") {
            $bulan = "Januari";
        }elseif ( $bulan == "02") {
            $bulan = "Februari";
        }
        elseif ( $bulan == "03") {
            $bulan = "Maret";
        }
        elseif ( $bulan == "04") {
            $bulan = "April";
        }
        elseif ( $bulan == "05") {
            $bulan = "Mei";
        }
        elseif ( $bulan == "06") {
            $bulan = "Juni";
        }
        elseif ( $bulan == "07") {
            $bulan = "Juli";
        }
        elseif ( $bulan == "08") {
            $bulan = "Agustus";
        }
        elseif ( $bulan == "09") {
            $bulan = "September";
        }
        elseif ( $bulan == "10") {
            $bulan = "Oktober";
        }
        elseif ( $bulan == "11") {
            $bulan = "November";
        }
        elseif ( $bulan == "12") {
            $bulan = "Desember";
        }else {
            $bulan = "itu mah bukan bulan";
        }
        
    
    } ?>
    <div class="card">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <label for="inputnopegawai">Masukan no:</label>
      <input type="text" id="inputnopegawai" name="inputnopegawai" placeholder="masukan hanya 11 angka" required autofocus>
      <button name="submit">Submit</button>
      <?php if(isset($_POST["submit"])): ?>
        
        <h1>Hasil Penilaian</h1>
        <ul>
          <li><strong>NO Pegawai:</strong><?php echo isset($noPegawai) ? $noPegawai : ""; ?></li>
          <li><strong>NO Golongan:</strong> <?php echo isset($G) ? $G : ""; ?></li>
          <li><strong>Tanggal Lahir:</strong> <?php echo isset($tanggal) && isset($bulan) && isset($tahun) ? $tanggal . " - " . $bulan . " - " . $tahun : ""; ?></li>
          <li><strong>NO Urutan:</strong> <?php echo isset($nn) ? $nn : ""; ?></li>
        </ul>
        <?php endif; ?>
        
      </form>
      </div>
</body>
</html>
