<!DOCTYPE html>
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
                <label for="angka">Masukkan Angka:</label>
            <!-- name dengan tanda [] berarti bahwa semua input dengan name yang sama,
            valuenya akan diambil dan disimpan dalam bentuk array.-->
                <input type="number" name="angka[]" id="angka">
            </div>
        </div>
        <p style="cursor: pointer; color: blue;" onclick="tambahInput()">Tambah Input Form</p>
        <button type="submit" name="submit">Kirim</button>
    </form>

    <script>
        let jumlahInput = 1;
        function tambahInput() {
            // untuk mendefinisikan variable pada JS menggunakan let/const : let untuk variabel yang bisa berubah valuenya.
            // const variable yang tidak bisa diubah valuenya.
            // backtip (``) digunakan untuk pembuatan string yang tidak satu baris : bisa dipakai di php juga.
            let inputElement = `
            <br><div style="display: flex;">
                <label for="angka">Masukkan Angka: </label>
                <input type="number" name="angka[]" id="angka">
            </div>
            `;
            // jumlah input di increments untuk mengetahui skrang jumlah inputnya uda ada berapa
            // jumlahInput = jumlahInput + 1;

            jumlahInput += 1;
            // jumlahInput++
            // document : pengambil alihan baris kode HTML
            // getElementById = mengambil tag HTML yang memiliki Id tersebut: selain itu, ada getElementByClass
            // getElementByTagName, queryselector tergantung identitas yang akan diambil

            if( jumlahInput < 10 ) {
                // kalau jumlahInput nya masih kurang dari 10, input baru boleh dimunculkan/ tambahin
                // innerHTMl : menambahkan tag HTML baru
                document.getElementById('wrap') . innerHTML += inputElement;
            }
        }
    </script>

    <?php 
    if (isset($_POST['submit'])) {
        $arrAngka = $_POST['angka'];
        $nilai_terbesar = max($arrAngka);
        $nilai_terkecil = min($arrAngka);
        // array_sum : seluruh item arr dijumlahkan, count : menghitung jumlah item yang terdapat pada array

        $rata_rata = array_sum($arrAngka); // count($arrAngka);
        echo "Nilai Terbesar: " . 
        $nilai_terbesar . "<br> Nilai Terkecil: " .
        $nilai_terkecil . "<br> Rata-Rata: " . $rata_rata;
    }
    ?>
</body>

</html>