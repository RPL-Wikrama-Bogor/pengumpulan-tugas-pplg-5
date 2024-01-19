<?php
    function ubahWaktu($waktu_awal){
        $waktu_ubah = strtotime($waktu_awal);
        $waktu_hasil = date("h.ia",$waktu_ubah);

        if (substr($waktu_hasil, 0, 2) == "01") {
            $waktu_hasil = "07" . substr($waktu_hasil, 2);
        }
        if (substr($waktu_hasil, 0, 5) == "11.45") {
            $waktu_hasil = "08.55" . substr($waktu_hasil, 5);
        }
        
            $waktu_hasil = substr($waktu_hasil, 0, 5) . 'am';
            
        return $waktu_hasil;
    }
    $jam = "19.00pm";
    $waktu_terkonversi = ubahWaktu($jam);
    
    echo $jam, "<br>";
    echo $waktu_terkonversi, "<br>" ,"<br>";
        
    $jam1 = "11.45pm";
    $waktu_terkonversi1 = ubahWaktu($jam1);

    echo $jam1, "<br>";
    echo $waktu_terkonversi1, "<br>" ,"<br>";
?>