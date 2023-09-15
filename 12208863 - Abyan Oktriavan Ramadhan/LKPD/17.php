<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LKPD 17</title>
</head>
<body>
    <form action="" method="post">
        <div id="warp">
            <div style="display: flex">
                <label for="angka">masukan angka :</label>
                <!-- name dengan tanda [] berarti bahwa semua input dengan name yang sama, valuenya akan diambil semia dan disimpan dalam bentuk array -->
                <input type="number" name="angka[]" id="angka">
            </div>
        </div>
        <p style="cursor: pointer; color: blue" onclick="tambahinput()">tambah input form</p>
        <button type="sbumit" name="submit">kirim</button>
    </form>
    <script>
        let jumlahInput = 1;
        function tambahinput(){
            //untuk mendefinisikan variable pada JS menggunakan let/const : let untuk variable yang bisa berubah value nya, const variable yang tidak bisa di ubah value nya
            // backtip ( ` ` )  digunakan untuk pembuatan string  yang tidak satu baris : bisa di pake di php juga
            let inputElement = `
            <br><div style="display: flex;">
                <label for="angka">Masukan Angka :
                <input type="number"  id="angka" name="angka[]">
                </div>
                `;
                //jumlah input di increments untuk mengetahui sekarang jumpah inputnya ada berapa
                //jumpahInput  = jumpalinput + 1
                jumlahInput += 1;
                // jumlahinput++
                // document : pengambilan alih barus kode html
                // getElementById : mengambil tag html yang memiliki id tersebut : selain itu, ada getElementByClass,GetElementBytagname, queryslectort tergantung identitas yang akan diambil
                if (jumlahInput <= 10){
                    //kalau jumlah inputnya msai kurang dari 10, input baru bole di muncum/di tambahin
                    //innerHTML : menambahkan tag hatml baru
                    document.getElementById('warp'). 
                    innerHTML += inputElement;
                }
        }
    </script>
        <!-- proses  -->

        <?php 

        if(isset($_POST['submit'])){
            $arrAngka = $_POST['angka'];
            $nilaiTerbesar = max($arrAngka);
            $nilaiTerkecil = min($arrAngka);
            //array_sum : seluruh item arr di jumlahkan, count : menghitung jumlah item yang terdapat pada array
            $rataRara = array_sum($arrAngka) / count($arrAngka);
            echo "nilai terbesar : ". $nilaiTerbesar . "<br> Nilai terkecil : ". 
            $nilaiTerkecil . "<br> rata rata : ". 
            $rataRara;
        }
        ?>
</body>
</html>