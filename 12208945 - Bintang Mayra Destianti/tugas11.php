<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="kotak">
<form action="" method="post">
        <table>
            <tr>
                <td>No pegawai</td>
                <td>:</td>
                <td><input type="text" name="no_pegawai" id="no_pegawai"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="cari" name="submit"></td>
            </tr>
        </table>
</body>
</html>
</div> -->

<body>
    <main>
        <form id="login_form" class="form_class" action="" method="post">
            <div class="form_div">
                <label>No pegawai:</label>
                <input class="field_class" name="no_pegawai" type="number" placeholder="masukan nomor pegawai" autofocus>
                <button class="submit_class" type="submit" form="login_form" name="submit" onclick="return validarLogin()">Submit</button>
            </div>
        </form>
    </main>
</body>

<div class="class_hasil">
<div class="hasil">
<?php
if (isset($_POST['submit'])) {
    $no_pegawai = $_POST['no_pegawai'];
    $tanggal_lahir;
    $no_golongan;

    $no_golongan = substr($no_pegawai, 0, 1);
    $tanggal = substr($no_pegawai, 1, 2);
    $bulan = substr($no_pegawai, 3, 2);
    $tahun = substr($no_pegawai, 5, 4);
    $no_urutan = substr($no_pegawai, 9, 2);

    if($no_pegawai < 11){
        echo "no pegawai tidak sesuai";
    }
    elseif($bulan == "01"){
        echo "Januari";
    }
    elseif ($bulan == "02"){
        echo "Februari";
    }
    elseif ($bulan == "03"){
        echo "Maret";
    }
    elseif ($bulan == "04"){
        echo "April";
    }
    elseif ($bulan == "05"){
        echo "Mei";
    }
    elseif ($bulan == "06"){
        echo "Juni";
    }
    elseif ($bulan == "07"){
        echo "Juli";
    }
    elseif ($bulan == "08"){
        echo "Agustus";
    }
    elseif ($bulan == "09"){
        echo "September";
    }
    elseif ($bulan == "10"){
        echo "Oktober";
    }
    elseif ($bulan == "11"){
        echo "November";
    }
    else{
        echo "Desember";
    }

    $tanggal_lahir = $tanggal . $bulan . $tahun;

    echo "<br/>";
    echo "No Golongan :" .$no_golongan;
    echo "<br/>";
    echo "Tanggal Lahir :" .$tanggal_lahir;
    echo "<br/>";
    echo "No urutan :" .$no_urutan;
    echo "<br/>";
}

?></div></div>

<style>
    * {
    padding: 0px;
    margin: 0px;
}
body {
    background-image :url("img/musik.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    /* background-color: #B9B4C7 ; */
}
h1 {
    letter-spacing: 1.5vw;
    font-family: 'system-ui';
    text-transform: uppercase;
    text-align: center;
}
main {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 75vh;
    width: 100%;
    background-size: cover;
}
.form_class {
    width: 500px;
    padding: 40px;
    border-radius: 8px;
    background-color: #D5CEA3;
    font-family: 'system-ui';
    box-shadow: 5px 5px 10px rgb(0,0,0,0.3);
}
.form_div {
    text-transform: uppercase;
}
.form_div > label {
    letter-spacing: 3px;
    font-size: 1rem;
}
/* .info_div {
    text-align: center;
    margin-top: 20px;
}
.info_div {
    letter-spacing: 1px;
} */
.field_class {
    width: 100%;
    border-radius: 6px;
    border-style: solid;
    border-width: 1px;
    padding: 5px 0px;
    text-indent: 6px;
    margin-top: 10px;
    margin-bottom: 20px;
    font-family: 'system-ui';
    font-size: 0.9rem;
    letter-spacing: 2px;
}
.submit_class {
    border-style: none;
    border-radius: 5px;
    background-color: #F6F1F1;
    padding: 8px 20px;
    font-family: 'system-ui';
    text-transform: uppercase;
    letter-spacing: .8px;
    display: block;
    margin: auto;
    margin-top: 10px;
    box-shadow: 2px 2px 5px rgb(0,0,0,0.2);
    cursor: pointer;
}
.hasil{
    text-align: center;
    margin-right: auto;
    margin-left: auto;
}
.class_hasil {
    width: 500px;
    padding: 40px;
    border-radius: 8px;
    background-color: #D5CEA3;
    font-family: 'system-ui';
    box-shadow: 5px 5px 10px rgb(0,0,0,0.3);
    margin-right: auto;
    margin-left: auto;
    margin-top: -70px;
}
    /* body{
        background-color: #FAF0E6;
    }
    table{
        margin-left: auto;
        margin-right: auto;
        margin-top: 260px;
    }
    .kotak{
        margin-top: 8em;
        background-color: #EAECF0;
        margin-left: 500px;
        margin-right: 500px;
        border-radius: 10px;
        height: 100px;
        } */
</style>