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



<!-- <?php
    // session_start(); 

    // if (!isset($_SESSION['loop'])) {
    //     $_SESSION['loop'] = 0; 
    //     $_SESSION['max'] = null;
    //     $_SESSION['min'] = null;
    //     $_SESSION['total'] = 0;
    //     $_SESSION['entryCount'] = 0;
    // }

    // if ($_SESSION['loop'] >= 20) {
    //     session_destroy();
    //     echo "<p>Anda telah mencapai batas 20 kali input.</p>";
    // } else {
    //     ?>
    //     <center>
    //     <div class="card" style="width:23rem; padding: 4rem; margin-top:9rem;">
    //     <form method="post" action="">
    //         <label>Masukkan angka:</label>
    //         <input type="number" name="angka" class="form-control">
    //         <button type="submit" value="Cari Tertinggi" class="btn btn-primary" style="margin-top:2rem;">kirim</button> 
    //     </form>

    //     <?php

    //     if(isset($_POST['angka'])) {
    //         $input = $_POST['angka'];

    //         if (!isset($_SESSION['max']) || $input > $_SESSION['max']) {
    //             $_SESSION['max'] = $input;
    //         }

    //         if (!isset($_SESSION['min']) || $input < $_SESSION['min']) {
    //             $_SESSION['min'] = $input;
    //         }

    //         $_SESSION['total'] += $input;
    //         $_SESSION['entryCount']++;

    //         echo "<p>Nilai tertinggi saat ini adalah: {$_SESSION['max']}</p>";
    //         echo "<p>Nilai terkecil saat ini adalah: {$_SESSION['min']}</p>";

    //         if ($_SESSION['entryCount'] > 0) {
    //             $average = $_SESSION['total'] / $_SESSION['entryCount'];
    //             echo "<p>Rata-rata nilai saat ini adalah: $average</p>";
    //         }

    //         $_SESSION['loop']++;
    //     }
    // }
    ?>

<a href="no18.php">Lanjut</a>
    <br><br>
<a href="no16.php">Kembali</a> 
    </div></center> -->