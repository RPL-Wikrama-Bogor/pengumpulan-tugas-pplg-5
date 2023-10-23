<?php
$tabungan = [10000, 50000, 10000, 5000, 20000, 5000, 50000, 20000];
$teks = implode(", ", $tabungan);
echo "<b></b>Uang yang terdapat di tabungan saya adalah <b>" . $teks . "</b>";
echo "<br>";
echo "Jumlah tabungan saya adalah <b>" . array_sum($tabungan) . "</b>";
echo "<br>";
$pecahan = array_unique($tabungan);
$pecahan_implode = implode(", ", $pecahan);
echo "Didalam tabungan saya terdapat uang pecahan <b>" . $pecahan_implode . "</b>";
echo "<br>"; 
echo "Pecahan uang terkecil adalah <b>" . min($tabungan) . "</b>";
echo "<br>";
echo "Pecahan uang terbesar adalah <b>" . max($tabungan) . "</b>";
echo "<br>";
$urutan_terkecil = $tabungan;
asort($urutan_terkecil);
$urutan_terkecil_implode = implode(", ", $urutan_terkecil);
echo "Jika diurutkan dari yang terkecil maka uang yang berada di tabungan adalah <b>" . $urutan_terkecil_implode . "</b>";
echo "<br>";
$urutan_terbesar = $tabungan;
arsort($urutan_terbesar);
$urutan_terbesar_implode = implode(", ", $urutan_terbesar);
echo "Jika diurutkan dari yang terbesar maka uang yang berada di tabungan adalah <b>" . $urutan_terbesar_implode . "</b>";
echo "<br>";
$tabungan_baru = [];
foreach($tabungan as $key => $tabung){
    if($tabung == 50000){
        array_push($tabungan_baru, $key);
    }
}
for($i = 0; $i < count($tabungan_baru); $i++){
    if($i == 0){
        array_splice($tabungan, $tabungan_baru[$i], 1, 100000);
    }else{
        unset($tabungan[$tabungan_baru[$i]]);
    }
}
$splice_implode = implode(", ", $tabungan);
echo "Saya ingin mengganti pecahan <b>50000</b> yang ada ditabungan menjadi <b>100000</b>, maka uang yang berada di tabungan menjadi <b>" . $splice_implode . "</b>";
echo "<br>";
array_push($tabungan, 20000);
$tambah_tabungan = implode(", ", $tabungan);
echo "Hari ini saya menabung sebesar <b>20000</b>, maka kini uang yang berada di tabungan saya adalah <b>" . $tambah_tabungan . "</b>";
echo "<br>";
$tambah_urutan_terkecil = $tabungan;
asort($tambah_urutan_terkecil);
$tambah_urutan_terkecil_implode = implode(", ", $tabungan);
echo "Jika diurutkan dari yang terkecil kini tabungan saya adalah <b>" . $tambah_urutan_terkecil_implode . "</b>";
echo "<br>";
echo "Maka jumlah tabungan saya saat ini adalah <b>" . array_sum($tabungan) . "</b>";
?>