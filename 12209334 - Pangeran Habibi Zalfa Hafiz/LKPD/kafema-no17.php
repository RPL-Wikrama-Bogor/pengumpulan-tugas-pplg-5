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
            <label for="angka">Masukan angka :
            </label>
            <input type="number" name="angka" id="angka">
            </div>
        </div>
        <p style="cursor : pointer;color:blue" onclick="tambahInput()">Tambah input form</p>
        <button type="submit" name="submit">Kirim</button>
    </form>
    <script>
        let jumlahInput=1 ;
        function tambahInput(){
            //Untuk mendefinisikan variable pada JS menggunakan let/const : let untuk const variable yang bisa berubah value nya, const variable yang tidak bisa diubah valuenya
            //backip ( " " ) digunakan untuk pepbuatan string yang tidak satu baris
            //bisa di pakai di php juga

            let inputElement = 
            `<br> <div style="display:flex;">
            <label for="angka"> Masukan angka : </label>
            <input type="number" name="angka[]" id="angka">
            </div>`;
            //jumlah input di increments untuk mengtahui sekarang jumlah inpunya udah ada berapa
            //jumlahInput++
            //document :mengambil aliran baris kode HTML
            //getElementById : mengambil tah HTML yang memiliki id tersebut : selain itu, ada getElementByClass, getElementarByTagName, querrySelector tergantung identitas yang akan di ambil

            if(jumlahInput < 10){
                    //kalau jumlah input nya asi kurang dari 10, input baru boleh dimuncul/ditambahin
                    //innerHTML : menambahlan tah HTML baru
                    document.getElementById('wrap').innerHTML += inputElement;
            }
        }
    </script>
    <!-- proses -->
    <?php
        if(isset($_POST['angka'])){
            $arrAngka = $_POST['angka'];
            $nilaiTerbesar = max($arrAngka);
            $nilaiTerkecil = min($arrAngka);
            //array_sum : seluruh item arr dijumlahkan, count : menghitung jumlah item yang terdapat pada array
            $rataRata = array_sum($arrAngka) / count($arrAngka);
            echo "Nilai Terbesar :" .
            $nilaiTerbesar . "<br> nilai terkecil :". $nilaiTerkecil . "<br> Rata-rata :" . $rataRata;
        }
    ?>
</body>
</html>