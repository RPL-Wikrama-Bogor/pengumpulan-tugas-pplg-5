<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>waktu</title>
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
    background: url(wdHPeE.jpg)no-repeat;
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
    color: white;
}
.inputbox ion-icon{
    position: absolute;
    right: 8px;
    color: white;
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

.keluar{
    color:white;
    margin-top:20px;
    font-size:20px
}

</style>
</head>
<body>
<section>
    <div class="form-box">
        <div class="foem-value">
            <form action="" method="post">
                <h2>masukan</h2>
               
                <div class="inputbox">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" required name="hh">
                    <label for="">jam</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="text" required name="mm">
                    <label for="">menit</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="text" required name="ss">
                    <label for="">detik</label>
                </div>
                
                <button type="submit" name="submit">Hitung</button>
                
            </form>


<?php
if (isset($_POST['submit'])) {
   

    
    $hh = $_POST['hh'];
    $mm = $_POST['mm'];
    $ss = $_POST['ss'];

    $ss = $ss +1;
    if ($ss>=60) {
        $mm = $mm+1;
        $ss=00 ;

        if ($mm>=60) {
            $hh =$hh +1;
            $mm = 00;
            $ss = 00;

            if ($hh>=24) {
                $hh=00;
                $mm=00;
                $ss=00;
            }
        }
        
    }else{
        $ss=$ss ;
    }
    
        echo"<div class='keluar'>jam".$hh;
        echo"menit".$mm;
        echo"detik".$ss."</div>";
        
    
}?>
</body>
</html>
