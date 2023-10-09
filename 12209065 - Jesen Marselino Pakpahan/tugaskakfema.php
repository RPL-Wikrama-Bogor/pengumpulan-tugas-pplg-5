<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <ul>
            <p>INI TUGAS YA</p>
        </ul>
    </nav>
    <img class="gambar" src="Stunting.jpg" alt="">
    <h1>Stunting</h1><br>
    <footer class="footer">
        Stunting adalah kondisi gagal pertumbuhan pada anak akibat kekurangan gizi kronis yang terjadi pada masa awal
        kehidupan, terutama pada periode 1.000 hari pertama, yaitu mulai dari saat kehamilan hingga anak berusia 2
        tahun.<br> Kekurangan gizi kronis ini dapat mengakibatkan gangguan pertumbuhan fisik dan perkembangan otak anak
        secara permanen.<br>

        Ciri utama dari stunting adalah anak memiliki tinggi badan yang lebih pendek dari rata-rata usianya, jika
        dibandingkan dengan standar pertumbuhan yang sehat.<br> Stunting juga bisa memiliki dampak buruk terhadap
        perkembangan kognitif dan kemampuan belajar anak, serta meningkatkan risiko penyakit kronis di masa dewasa,
        seperti diabetes, penyakit jantung, dan gangguan metabolisme.<br>

        Stunting umumnya disebabkan oleh asupan gizi yang tidak memadai, infeksi berulang, sanitasi yang buruk, dan
        faktor-faktor sosial ekonomi.<br> Kehamilan yang tidak sehat, bayi yang lahir dengan berat badan rendah, dan
        pola pemberian makan yang tidak tepat juga dapat berkontribusi pada terjadinya stunting.<br>
    </footer><br>

    <div class="horizontal">

    </div>



</body>
<h1>Solusi</h1>

<div class="content2">

    <div class="card">
        <p>Memberikan ASI eksklusif pada bayi hingga berusia 6 bulan.</p>
    </div>

    <div class="card">
        <p>Memantau perkembangan anak dan membawa ke posyandu secara berkala.</p>
    </div>

    <div class="card">
        <p> Mengkonsumsi secara rutin Tablet tambah Darah (TTD)</p>
    </div>

    <div class="card">
        Memberikan MPASI yang begizi dan kaya protein hewani untuk bayi yang berusia diatas 6 bulan.</p>
    </div>

</div>
<center>
    <form action="#" method="post">
        <label for="nama">
            <input type="text" name="nama" placeholder="Nama"><br><br>
            <label for="email">
                <input type="text" name="email" placeholder="Email"><br><br>
                <label for="keluhan">
                    <input type="text" name="keluhan" placeholder="Keluhan"><br><br><br>
                    <button name="submit">Submit</button> <br>

    </form>
</center>



</html>

<?php
if(isset($_POST['submit'])){
$nama =$_POST['nama'];
$email =$_POST['email'];
$keluhan =$_POST['keluhan'];

echo $nama;
echo $email;
echo $keluhan;


}
?>