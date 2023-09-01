<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 17</title>
</head>
<body>
    <form action="" method="post">
        <div id="wrap">
            <div style="display: flex;">
            <label for="angka">Masukan angka :</label>
            <!-- name dnegan tanda [] berarti bahwa semua input dengan name yang sama, valuenya akan diambil semua dan diisikan disimpan dalam bentuk array -->
            <input type="number" name="angka[]" id="angka">
            </div>
        </div>
        <p style="cursor: pointer; color: blue;" onclick="tambahInput()" >Tambah Input Form</p>
        <button type="submit" name="submit">Kirim</button>
    </form>

    <script>
        let jumlahInput =1;
        function tambahInput() {
            //untuk mendefinisikan variable pada JS menggunakan let/cost : lrt untuk variable yang bisa berubah valuenya, cost variable yang tidak bisa diubah valuenya
            // backtip ('') digunakan untuk pembuatan string yang tidak satu baris : bisa dipake di php juga
            let inputElement = `
            <br><div style="display: flex;">
            <label for="angka">Masukan Angka : </label>
            <input type="number" name="angka[]" id="angka">
            `;

            //jumlah input di increment untuk mengetahui string jumlah inputnya udah ada berapa
            //jumlahInput = jumlahInput + 1;
            jumlahInput += 1;
            //jumlahInput++
            //document : pengambilan alihan baris kode HTML
            //getElementById : mengambil tag HTML yang memiliki id tersebut: setelah itu, ada getElementByClass, getElementByTagname, querySelector, tergantung identitas yang akan diambil
            if (jumlahInput < 10) {
                //kalau jumlahInpunya masi kurang dari 10, Input baru boleh di munculkan/ ditambahkan
                //innerHTML : menambahkan tag HTML baru
                document.getElementById('wrap') . innerHTML += inputElement;
            }
        }
    </script>
    <!-- proses -->
    <?php
        if (isset($_POST['submit'])) {
            $arrAngka = $_POST['angka'];
            $nilaiTerbesar = max($arrAngka);
            $nilaiTerkecil = min($arrAngka);
            //array_sum : seluruh item arr dijumlahkan, count : menghitung jumlah item yang terdapat pada array
            $rataRata = array_sum($arrAngka) / count($arrAngka);
            echo "Nilai Terbesar  : ", $nilaiTerbesar , "<br> Nilai Terkecil : ", $nilaiTerkecil , "<br> Rata-Rata  :", $rataRata;
        }
    ?>
</body>
</html>