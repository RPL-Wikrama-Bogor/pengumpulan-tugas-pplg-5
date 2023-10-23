<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 18</title>
</head>
<body>
    <form action="" method="post">
        <div id="wrap">
            <div style="text-align: bottom;">
                <label for="nama">Masukan Nama Anda</label><br>
                <input type="text" name="nama[]" id="nama"><br><br>

                <label for="nilaiMtk">Masukan Nilai MTK</label><br>
                <input type="number" name="nilaiMtk[]" id="nilaiMtk"><br><br>

                <label for="nilaiIndo">Masukan Nilai Bahasa Indonesia</label><br>
                <input type="number" name="nilaiIndo[]" id="nilaiIndo"><br><br>

                <label for="nilaiIng">Masukan Nilai Bahasa Inggris</label><br>
                <input type="number" name="nilaiIng[]" id="nilaiIng"><br><br>

                <label for="nilaiDpk">Masukan Nilai DPK</label><br>
                <input type="number" name="nilaiDpk[]" id="nilaiDpk"><br><br>

                <label for="nilaiAgama">Masukan Nilai Agama</label><br>
                <input type="number" name="nilaiAgama[]" id="nilaiAgama"><br><br>

                <label for="khdrn">Masukan Persentase Kehadiran</label>
                <input type="number" name="khdrn[]" id="khdrn">
            </div>
        </div>
        <p style="cursor: pointer; color: blue;" onclick="tambahInput()">Tambah Input Form</p>
        <button type="submit" name="submit">Kirim</button>
    </form>

    <script>
        let jumlahInput = 1;
        function tambahInput() {
            let inputElement = `
            <br><div style="text-align: bottom;">
                <label for="nama">Masukan Nama Anda</label><br>
                <input type="text" name="nama[]" id="nama"><br><br>

                <label for="nilaiMtk">Masukan Nilai MTK</label><br>
                <input type="number" name="nilaiMtk[]" id="nilaiMtk"><br><br>

                <label for="nilaiIndo">Masukan Nilai Bahasa Indonesia</label><br>
                <input type="number" name="nilaiIndo[]" id="nilaiIndo"><br><br>

                <label for="nilaiIng">Masukan Nilai Bahasa Inggris</label><br>
                <input type="number" name="nilaiIng[]" id="nilaiIng"><br><br>

                <label for="nilaiDpk">Masukan Nilai DPK</label><br>
                <input type="number" name="nilaiDpk[]" id="nilaiDpk"><br><br>

                <label for="nilaiAgama">Masukan Nilai Agama</label><br>
                <input type="number" name="nilaiAgama[]" id="nilaiAgama"><br><br>

                <label for="khdrn">Masukan Persentase Kehadiran Anda</label>
                <input type="number" name="khdrn[]" id="khdrn">
            </div>`;

            jumlahInput += 1;

            if (jumlahInput <= 15) {
                document.getElementById('wrap').innerHTML += inputElement;
            }
        }
    </script>

    <?php
    if (isset($_POST['submit'])) {
        $kehadiran = $_POST['khdrn'];
        $mtk = $_POST['nilaiMtk'];
        $indo = $_POST['nilaiIndo'];
        $ing = $_POST['nilaiIng'];
        $dpk = $_POST['nilaiDpk'];
        $agama = $_POST['nilaiAgama'];
        $nama = $_POST['nama'];

        $jumlahInput = count($nama);  // Menghitung jumlah data

        for ($i = 0; $i < $jumlahInput; $i++) {
            $mtk[$i] = intval($mtk[$i]);
            $indo[$i] = intval($indo[$i]);
            $ing[$i] = intval($ing[$i]);
            $dpk[$i] = intval($dpk[$i]);
            $agama[$i] = intval($agama[$i]);
            $kehadiran[$i] = intval($kehadiran[$i]);
        }

        for ($i = 0; $i < $jumlahInput; $i++) {
            $total = $mtk[$i] + $indo[$i] + $ing[$i] + $dpk[$i] + $agama[$i];
            if ($total >= 475 && $kehadiran[$i] == 100) {
                echo $nama[$i] . "juara<br>";
            } else {
                echo "maaf, " . $nama[$i] . "belum juara<br>";
            }
        }
    }
    ?>
</body>
</html>