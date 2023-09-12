<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/task12.css">
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.form {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    width: 80%;
    max-width: 400px;
    text-align: center;
}

.title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    margin-top: 1rem;
}

.title span {
    font-size: 18px;
    font-weight: normal;
    display: block;
}

.input {
    width: 20%;
    margin-left:5px;
    padding: 10px;
    border: 0.5px solid #F4EEEE;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    margin-bottom: 15px;
    font-size: 16px;
    margin-top: 2rem;
}
.input:focus{
    outline: none;
    box-shadow: 0 0 5px #ff6384;
    transform: scale(1.05);
    transition: transform 0.3s ease-in-out;
}

.button-confirm {
    background-color: #EAC7C7;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    margin-bottom : 2rem ;
}

.button-confirm:hover {
    outline: none;
    box-shadow: 0 0 5px #716F81;
    transform: scale(1.05);
    transition: transform 0.3s ease-in-out;
}

.error-message {
    color: red;
    
}

.card {
    background-color: #EAE0DA;
    border-radius: 5px;
    padding: 10px;
    margin-top: 20px;
    color: black;
    font-size: 16px;
    text-align: center;
    border: 1px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
}
</style>
<body>
    <div class="form">
    <form action="" method="post">
        <div class="title">Welcome<br><span>Silahkan Masukan Waktu</span></div>
        <input  class="input" type="number" name="jam" id="" placeholder="jam">
        <input  class="input" type="number" name="menit" id="" placeholder="menit">
        <input  class="input" type="number" name="detik" id="" placeholder="detik"><br><br>
        <input  class="button-confirm" type="submit" value="submit">
    </form>
    <?php
    if ($_SERVER ['REQUEST_METHOD'] == "POST") {
        $hh = $_POST['jam'] ;
        $mm = $_POST['menit'] ;
        $ss = $_POST['detik'] ;

        $ss = $ss + 1 ;
        if ($ss >=  60) {
            $mm = $mm + 1 ;
            $ss = $ss ;
            if ($mm >= 60) {
                $hh = $hh + 1 ;
                $mm = 00 ;
                $ss = 00 ;
            }if ($hh >= 24) {
                $hh = 00 ;
                $mm = 00 ;
                $ss = 00 ;
            }
        }?>
        <div class="card">
        <?php
        echo "$hh jam $mm menit $ss detik" ;
        }?>
        </div>
    <?php ?>
</div>
</body>
</html>