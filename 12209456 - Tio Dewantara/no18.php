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
            <label for="angka">nama </label>
            <input type="text" name="nama" id="nama"><br>
            <label for="angka">Kehadiran </label>
            <input type="number" name="hadir" id="hadir" min="0" max="100"><br>
            <label for="angka">MTK </label>
            <!-- nama dengan tanda [] berart bahwa semua input dengan nama ynag sama, valuenya akan diambil semua
            dan disimpan dalam bentuk array -->
            <input type="number" name="angka" id="angka"><br>
            <label for="angka">INDO </label>
            <input type="number" name="angka" id="angka"><br>
            <label for="angka">ING </label>
            <input type="number" name="angka" id="angka"><br>
            <label for="angka">DPK </label>
            <input type="number" name="angka" id="angka"><br>
            <label for="angka">AGAMA </label>
            <input type="number" name="angka" id="angka"><br>
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
                <label for="hadir">nama</label>
                <input type="text" name="nama[]" id="nama" >
                <br><div style="display:flex;">
                <label for="hadir">kehadiran </label>
                <input type="number" name="hadir" id="hadir" max='100' min='0'>
                <br><div style="display:flex;">
                <label for="angka">MTK </label>
                <input type="number" name="angka[]" id="angka">
                <br><div style="display:flex;">
                <label for="angka">INDO </label>
                <input type="number" name="angka[]" id="angka">
                <br><div style="display:flex;">
                <label for="angka">ING </label>
                <input type="number" name="angka[]" id="angka">
                <br><div style="display:flex;">
                <label for="angka">DPK </label>
                <input type="number" name="angka[]" id="angka">
                <br><div style="display:flex;">
                <label for="angka">AGAMA </label>
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
                if (jumlahInput < 15) {
                    //kalau jumlahInput nya masi kurg dari 10, input baru boleh dimuncul/ditambahin
                    //innerHTML : menambahkan tag html baru
                    document.getElementById('wrap').innerHTML += inputElement;
                }
            }
        </script>
        <!-- proses -->
        <?php
        if(isset($_POST['submit'])) {
           
            
            $hadir = $_POST['hadir'];
            $nama= $_POST['nama'];
            $arrAngka = $_POST['angka'];
            $nilaiTerbesar = max($arrAngka);
            $nilaiTerkecil = min($arrAngka);
            //array_sum : seluruh item arr dijumlahkan, count : menghitung jumlah item yg terdapat pd array
            $rataRata = array_sum($arrAngka) ;
            echo $nama[0], "<br>kehadiran:",$hadir ,"<br>Nilai Terbesar : " , $nilaiTerbesar , "<br> Nilai Terkecil : " , $nilaiTerkecil , "<br> Rata-rata : " , $rataRata;
        }
        ?>
    </body>
    </html> 