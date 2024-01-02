<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    </head>
<body>
    <div class="card">
    <center><h1>Rental Motor</h1></center>
    <center>
    <form method="post" action="">
        <label for="nama">Nama Pelanggan : </label>
        <input type="text" name="nama" autocomplete='off'><br>

        <label for="waktu">Lama Waktu Rental (per hari) : </label>
        <input type="number" name="waktu" autocomplete='off'><br>

        <label for="jenis">Jenis Motor : </label>
        <select name="tipe" id="tipe">
                <option value="scoopy_cinematic">Scoopy Cinematic</option>
                <option value="suzuki_gsx">Suzuki GSX</option>
                <option value="yamaha_r15">Yamaha R15</option>
                <option value="vebi">Vebi si Vespa Biru</option>
                <option value="vario_jamet">Vario Jamet</option>
                <option value="mio">Mio</option>
        </select><br>

        <button type="submit" name="submit">Submit</button>

    <div class="tampil"></div>
    <?php

    // kita membuat class baru dengan nama Rental
    class Rental {
        // ini array nama-nama yang terdaftar dalam member
        public $member = ["insya", "cicil", "yumna"];

        // ini fungsi untuk cek pajak
        public function pajak(){
            return 10000;
        }

        // ini fungsi untuk cek diskon
        public function disc($waktu, $nama) {
            // jika nama yg di input berada dalam array ["insya", "cicil", "yumna"] maka diberi diskon sebesar 5%
            if ($waktu > 0 && in_array($nama, $this->member)) {
                return 5;
            }

            return 0;
        }

        // ini fungsi untuk kalkulasi harga
        public function hitung_total($nama, $waktu, $tipe) {
            // memanggil function harga_rental untuk cek harga rental di function harga_rental
            $harga_perhari = $this->harga_rental($tipe);

            // memanggil function disc untuk cek apakah ada diskon
            $disc = $this->disc($waktu, $nama);

            // kalkulasi harga dikurangi diskon
            $total_sebelum_disc = $harga_perhari * $waktu;
            $total_disc = ($total_sebelum_disc * $disc) / 100;
            $total_setelah_disc = $total_sebelum_disc - $total_disc;

            // memanggil function pajak() untuk kalkulasi harga
            $pajak = $this->pajak();
            $total_biaya = $total_setelah_disc + $pajak;

            // memanggil function tampilkan_bukti untuk tampilkan echo dari hasil nya
            $this->tampilkan_bukti($nama, $waktu, $tipe, $disc, $harga_perhari, $total_biaya);
        }

        // ini fungsi untuk menampilkan ( echo ) dari hasil nya
        public function tampilkan_bukti($nama, $waktu, $tipe, $disc, $harga_perhari, $total_biaya) {
            echo $nama . " berstatus sebagai " . (in_array($nama, $this->member) ? "Member" : "Non-Member"). " ";
            echo (in_array($nama, $this->member) ? "mendapatkan diskon sebesar " . $disc . "%" : "mendapatkan diskon sebesar 0%") . "<br>";
            echo "Jenis motor yang di rental adalah " . $tipe . " selama " . $waktu . " hari<br>";
            echo "Harga rental per harinya: Rp. " . number_format($harga_perhari, 0, ',', '.') . "<br><br>";
            echo "Besar yang harus di bayarkan adalah :<b> Rp. " . number_format($total_biaya, 0, ',', '.') . "</b>";
        }

        // ini fungsi untuk cek harga rental sesuai tipe motor
        public function harga_rental($tipe) {
            $harga_perhari = 0;

            switch ($tipe) {
                case 'scoopy_cinematic':
                    $harga_perhari = 150000;
                    break;
                case 'suzuki_gsx':
                    $harga_perhari = 250000;
                    break;
                case 'yamaha_r15':
                    $harga_perhari = 270000;
                    break;
                case 'vebi':
                    $harga_perhari = 200000;
                    break;
                case 'vario_jamet':
                    $harga_perhari = 5000;
                    break; 
                 case 'Mio':
                    $harga_perhari = 10000;
                    break; 
            }

            return $harga_perhari;
        }
    }

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];

        // mengubah value string menjadi integer pada <input name="waktu">
        $waktu = intval($_POST['waktu']);
        $tipe = $_POST['tipe'];

        // new Rental itu untuk panggil class
        $rental = new Rental();

        // sekarang kita panggil function hitung_total yang terdapat dari class Rental()
        $rental->hitung_total($nama, $waktu, $tipe);
    }
    ?>
    </div>
    </center>
</body>
</html>