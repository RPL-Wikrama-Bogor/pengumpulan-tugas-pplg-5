<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh</title>
    <style>
        body {
            background-color: black;
        }
        .nav {
            float : right;
            text-decoration: none;
            border-radius: 15px;
            background-color: cadetblue;
        }
        
        .baris {
            padding: 50px;
        }
        .clas{
            float: left;
            color: white;
            font-size: 25px;
            margin: 20px;
        }

        img {
            width: 900px;
            max-width: 650px;
            float: right;
            border-radius: 15px;
        }
        .kolom{             
            
            height: 120px;
            background-color: cadetblue;
            margin: 3px;
            box-sizing: border-box;
            padding: 1px 50px;
            border-radius: 20px;
           
            
        }
        .baris2 {
            color: white;
            box-sizing: border-box;
            padding: 20px;
            clear: right;
            margin: 10px;
            
            
        }
        .kolom1, .kolom2, .kolom3, .kolom4 {
            float: left;
            width: 24%;
            text-align: center;
        }
        h5 {
            padding-top: -25px;
        }
        .detail {
        color: white;
        }

        .baris3{
            background-color: cadetblue;
            width: 350px;
            height: 440px;
            margin: 150px 2px 25px 45px;
            border-radius: 25px;
            outline: auto;
            margin-right: 20px;
            
        }
        .nama {
            text-align: center;
            padding: 10px 2px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color: white;
        }
        .submit {
            padding: 2px 25px;
            border-radius: 10px;
            float: right; 
            background-color: rgb(159, 193, 193);
        }
        .submit:hover {
            background-color: rgb(243, 251, 251);
        }
        .sub {
            padding: 2px 10px;
        }
        .input {
            padding: 10px;
        }
        .baris4 {
            outline: auto;
            width: 820px;
            height: 200px;
            margin-top: -450px;
            border-radius: 15px;
        }
       button{
        float: right;
        border-radius: 40%;
        background-color : yellow;
        padding : 8px 16px;
       }

        .tang {
            padding: -50px 100px;
            color: white;
            float: right;
        }
       
    </style>
</head>
<body>
    <button class="nav">Admin</button>
    <section class="baris">
    <div class="clas">

    <h3>Penjelasan</h3>
    <ol>1. Lorem Ipsum</ol>
    <ol>2. Lorem Ipsum</ol>
    <ol>3. Lorem Ipsum</ol>
    <ol>4. Lorem Ipsum</ol>
    </div>  
    <img src="cat.png" alt="">
    </div>
    </section>
<br>
    <section class="baris2">
        <div class="kolom kolom1">
            <h1 class="text">Jumlah Siswa MPLB</h1>
            <h5>66</h5>
        </div>
        <div class="kolom kolom1">
            <h1 class="text">Jumlah Siswa PPLG</h1>
            <h5>321</h5>
        </div>
        <div class="kolom kolom1">
            <h1 class="text">Jumlah Siswa TJKT</h1>
            <h5>139</h5>
        </div>
        <div class="kolom kolom1">
            <h1 class="text">Jumlah Siswa DKV</h1>
            <h5>142</h5>
        </div>
    </section>

    <section class="baris3">
        <div class="nama">
            <h2>
                ✧ Buat laporan ✧
            </h2>
        </div>

        
        <div class="input">
            <span class="detail">NIS</span><br>
            <input type="text" placeholder="Masukan NIS" size="25">
        </div>
            <div class="input">
                <span class="detail">Nama</span><br>
                <input type="text" placeholder="Masukan nama" size="25">
            </div>
            <div class="input">
                <span class="detail">No telp</span><br>
                <input type="text" placeholder="Masukan no telp" size="25">
            </div>
            <div class="input">
                <span class="detail">Laporan</span><Br>
                <textarea type="text" placeholder="Masukan laporan"></textarea>
            </div>
            <div class="input">
                <span class="detail">Laporan</span><Br>
                <input type="file" placeholder="Choose file">
            </div>
            <div class="sub">
               <button class="submit">Kirim</button>
            </div>
    </section>
</body>
</html>