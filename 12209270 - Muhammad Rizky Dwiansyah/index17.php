<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Max, Min, Ave</title>
</head>
<body>
    <form action="" method="post">
        <div id="wrap">
            <div style="display:flex;">
        <label for="angka">Masukkan Angka : </label>
        <!-- nama dengan tanda [] berart bahwa semua input dengan nama ynag sama, valuenya akan diambil semua
        dan disimpan dalam bentuk array -->
        <input type="number" name="angka" id="angka">
            </div>
        </div>
        <p style="cursor: pointer; color: blue;" onclick="tambahinput()">Tambah Input Form</p>
        <button type="submit" name="submit">Kirim</button>
    </form>
    <script>
        let jumlahInput = 1;
        function tambahinput() {
            // untuk mendefinisikan variable pada JS menggunakan let/const : let untuk variable yg bisa berubah valuenya,
            // const variable yg tdk bisa diubah valuenya
            // backtip('') digunakan untuk pembuatan string yg tdk satu baris : bisa diapke diphp juga

            let inputElement = `
            <br><div style="display:flex;">
            <label for="angka">Masukkan Angka : </label>
            <input type="number" name="angka[]" id="angka">
            </div>
            `;

            // jumlah input diincrements untuk meegtahui skrg jumlah inputnya udah ada brp
            // jumlahInput = jumlahInput + 1;
            jumlahInput += 1;
            //jumlahInput++
            //document : pengambil alihan baris kode html
            //getElementById : mengambil tag html yg memiliki id tersebut : selain itu, ada getElementByClass,
            //getElementByTagName, querySelector tergantung identitas yg kana diambil
            if (jumlahInput < 10) {
                //kalau jumlahInput nya masi kurg dari 10, input baru boleh dimuncul/ditambahin
                //innerHTML : menambahkan tag html baru
                document.getElementById('wrap').innerHTML += inputElement;
            }
        }
    </script>
    <!-- proses -->
    <?php
    if(isset($_POST['submit'])) {
        $arrAngka = $_POST['angka'];
        $nilaiTerbesar = max($arrAngka);
        $nilaiTerkecil = max($arrAngka);
        //array_sum : seluruh item arr dijumlahkan, count : menghitung jumlah item yg terdapat pd array
        $rataRata = array_sum($arrAngka) / count($arrAngka);
        echo "Nilai Terbesar : " , $nilaiTerbesar , "<br> Nilai Terkecil : " , $nilaiTerkecil , "<br> Rata-rata : " , $rataRata;
    }
    ?>
</body>
</html>