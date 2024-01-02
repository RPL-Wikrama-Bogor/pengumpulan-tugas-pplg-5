<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>12</title>

    <style>
body{
    background-color: grey;
}
.card {
  width: 300px; /* Sesuaikan lebar kartu sesuai kebutuhan */
  margin: 0 auto; /* Mengatur kartu ke tengah secara horizontal */
  text-align: center; /* Mengatur konten teks di tengah kartu */
  padding: 20px; /* Tambahkan padding sesuai kebutuhan */
}

/* Gaya tambahan sesuai kebutuhan */
h2 {
  font-size: 24px;
}

label {
  font-size: 16px;
}

input {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
}

button {
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
}

    </style>
</head>
<body>
    <div class="card">
    <h2>Menambahkan 1 Detik</h2>
<form action="" method="post">
    <label> masukan jam</label> <br>
   <input type="text" name="hh" placeholder="Jam"><br>

    <label> masukan menit</label> <br>
   <input type="text" name="mm" placeholder="Menit"><br>

    <label> masukan detik</label> <br>
   <input type="text" name="ss" placeholder="Detik"><br>
    <br><button type="submit" name="submit">submit</button>
    </form>
    </div>
</body>
</html>
<center>
<?php
if (isset($_POST['submit'])) {
   

    
    $hh = $_POST['hh'];
    $mm = $_POST['mm'];
    $ss = $_POST['ss'];
        //menambahkan detik
    $ss = $ss +1;
    if ($ss>=60) {
        $mm = $mm+1;
        $ss=00 ;
        //menambahkan Menit
        if ($mm>=60) {
            $hh =$hh +1;
            $mm = 00;
            $ss = 00;
        //Menambahkan Jam
            if ($hh>=24) {
                $hh=00;
                $mm=00;
                $ss=00;
            }
        }
        
    }else{
        $ss=$ss ;
    }

    echo "Jam :" .$hh . "<br>";
    echo "menit : ".$mm . "<br>";
    echo "detik : ".$ss;
        
    
    }
?>
    </center>