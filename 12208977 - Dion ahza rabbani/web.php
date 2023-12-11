<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olympus</title>
</head>
<img  border="3px"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkqpovQl9DU4U_OwVTOcZrQcZ_CQAlX74EfQ&usqp=CAU" alt="">
<body>
    <h1>Apakah main slot itu dosa?</h1><br>
    <P>Sebagaimana disebutkan sebelumnya, slot dikategorikan sebagai judi online. Oleh karena itu, </P>
    <p>jumhur ulama mengatakan bahwa hukum main slot adalah haram</p><br>
    <ul>
        <li>Kerugian Finansial: Slot bisa menjadi permainan yang sangat mengasyikkan, 
            tetapi juga sangat berisiko.<br> Orang dapat kehilangan banyak uang dengan cepat jika mereka tidak bermain dengan bijak</li><br>
        <li>Ketergantungan: Mesin slot dapat menyebabkan ketergantungan bagi beberapa orang.
            <br> Hasrat untuk terus bermain dalam harapan memenangkan kembali kerugian dapat mengakibatkan <br>pengeluaran finansial yang lebih besar dan dampak negatif pada kehidupan pribadi, sosial, dan pekerjaan.</li>
      
    </ul>
    
     
<center><h2 class="solusi">Solusi</h2></center>
<div class="sol">
    <h3><div class="kaki">Bekerja dengan giat </div>   </h3>
    <h3><div class="kaki1">   Ibadah </div></h3>
    <h3><div class="kaki2"> Sedekah</div></h3>
    <h3><div class="kaki3"> Menabung</div></h3></div>
</body>
<div class="kon">

</table>
<footer><form action="" method="post">
    <input type="text" name="nama" placeholder="Nama"><br><br>
    <input type="text" name="email" placeholder="Email"><br><br>
    <input type="text" name="keluhan"  placeholder="Keluhan" class="kel" >
    <button name="Submit" class="but">Kirim</button>
    
    
    
</footer></form>
<!-- <table border="2px" class="bor" >
<tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
    </tr>   
</table> -->

</html>
<?php
if(isset($_POST['submit'])){
$nama=$_POST['nama'];
$email=$_POST['email'];
$kel=$_POST['keluhan'];
echo $nama,$email,$kel;
    
}



?>
<style>

.bor{
    height:40px;
    width: 50px;
    margin-right:10px;
}
    .kon{
        display:flex;
    }
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

h1, p, ul, li {
    margin: 0;
    padding: 0;
}
h1 {
    padding: 20px;

    background-color: #9e9797;
}

ul {
    
    padding-left: 20px;
}

li {
    margin-bottom: 10px;
}

img {
    float: right;
    height: 250px;
    width: 250px;
    margin-top: 80px;
    margin-right:50px ;
}

.solusi{
    color:#9e9797;
}
.sol .kaki .kaki1 .kaki2 .kaki3{
    border-radius:20px;
}
.sol  {
    margin-top:90px ;
    padding: 10px;
    display: flex;
   
    

}
.sol .kaki{
    background-color:rgb(46, 138, 84) ;
    
   margin-right: 20px;
    padding: 100px;
    padding-left:50px ;
    text-align: center;

}
.sol .kaki1{
    background-color:rgb(102, 255, 0) ;
    margin-right: 20px;
padding:100px ;
padding-left:70px ;
    text-align: center;
    
}
.sol .kaki2{
    background-color:rgb(40, 182, 192) ;
    padding-left: 20px;
    padding:100px ;
    margin-right: 20px;
    
}
.sol .kaki3{
    background-color:rgb(243, 7, 85) ;
    padding-left: 20px;
    padding:100px ;
    
    
} .sol{
    margin-right:50px ;
}
.sol:hover .kaki{
    background-color:rgb(44, 168, 96) ;
    
}
.sol:hover .kaki1{
    background-color:rgb(95, 180, 38) ;

    
}
.sol:hover .kaki2{
    
    background-color:rgb(39, 155, 163) ;
}
.sol:hover .kaki3{
    
    background-color:rgb(163, 35, 77) ;
}
.solusi{
    color: black;
    margin-top:20x ;
}
footer{
    background-color: aquamarine;
    padding:20px ;
    margin-right:80% ;
    border-radius:20px ;
    margin-left:15px ;
    margin-bottom:10px ;
    border:100px ;

}

input[type="text"]{
    border:3px ;
    border-radius:20px;
    text-align: center;
    font-style: italic;
    
}

 .kel{
 height:75px ;

}
.kel {
    border:3px ;
    border-radius:20px;
    margin-bottom:20px ;
}
.but{
    border-radius:20px ;
    font-style: italic;
    cursor: pointer;
}


    
</style>