<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div id="wrap">
            <div style="display: flex;">
                <label for="angka">Masukkan Angka :</label>
                <input type="number" name="angka[]" id="angka">
            </div>
        </div>
        <p style="cursor: pointer; color: blue;" onclick="tambahInput()">Tambah Input Form</p>
        <button type="submit" name="submit">Kirim</button>
    </form>
    <script>
        let jumlahInput = 1;
        function tambahInput() {
            let inputElement = `<div style="display: flex;"><label for="angka">Masukkan Angka :</label><input type="number" name="angka[]" id="angka"></div>`;
            
            jumlahInput += 1;
            if(jumlahInput < 10) {
                document.getElementById('wrap').
                innerHTML += inputElement;
            }
        }
    </script>
    <?php
        if(isset($_POST['submit'])) {
            $arrAngka = $_POST['angka'];
            $nilaiTerbesar = max($arrAngka);
            $nilaiTerkecil = min($arrAngka);
            $rataRata = array_sum($arrAngka) / count ($arrAngka);

            echo "Nilai Terbesar :" . $nilaiTerbesar . "<br> Nilai Terkecil :" . $nilaiTerkecil . "<br> Rata-Rata :" . $rataRata;
        }
    ?>
</body>
</html>