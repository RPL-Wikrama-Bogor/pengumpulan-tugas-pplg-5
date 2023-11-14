<!DOCTYPE html>
<html lang="en">
<head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Peminjaman motor</title>
</head>
        <body>
            <style>
                body {
                    background-color: #f0f0f0;
                }

                table {
                    border-collapse: collapse;
                    background-color: #fff;
                    border-radius: 5px;
                }
                
                td {
                    padding: 10px;
                    text-align: right;
                }

                td:first-child {
                    text-align: left;
                }

                select, input[type="number"] {
                    width: 100%;
                    padding: 5px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                }

                button {
                    background-color: #0074D9;
                    color: #fff;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }
            </style>
            <center>
        <h2>Rental Motor</h2>
        <form action="" method="post">
                    <table>
                        <tr>
                            <td>Nama </td>
                            <td>:</td>
                            <td><input type="text" name="name"></td>
                        </tr>
                        <tr>
                            <td>Waktu (perhari)</td>
                            <td>:</td>
                            <td><input type="number" name="time"></td>
                        </tr>
                        <tr>
                            <td>Jenis Motor</td>
                            <td>:</td>
                            <td>
                                <select name="pilihan" id="">
                                    <option value="" hidden>-------------Pilih--------------</option>
                                    <option value="mio">Mio</option>
                                    <option value="beat">Beat</option>
                                    <option value="ninja">Ninja</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><button type="submit" name="submit">Submit</button></td>
                        </tr>
                    </table>
                </form>
                

<?php

            if(isset($_POST['submit'])){
            $hasil = new user();
            $nama = $_POST['name'];
            $jenis = $_POST['pilihan'];
            $hari = $_POST['time'];
            $harga = 0;

            switch($jenis) {
                case "mio" :
                    $harga = $hasil->mio;
                    break;
                case "beat" : 
                    $harga = $hasil->beat;
                    break;
                case "ninja" : 
                    $harga = $hasil->ninja;
                    break;
                default :
                    $harga = 0;
                    break;
            }
            echo $hasil->userMember($harga, $jenis, $hari);
        }

?>
            </center>
</body>
</html>

<?php

        class data {

            protected $user = ['azhril', 'lirhza', 'ana'];
            
            public      $mio = 200000,
                        $beat = 120000,
                        $ninja = 400000;

            protected   $pajak = 10000,
                        $diskon = 5/100;

        }

        class user extends data{

            public function userMember($harga, $pilihan, $hari)
            {
                $result = $harga * $hari + $this->pajak;

                if (in_array($_POST['name'], $this->user)) {
                    $result = $result - ($result  * $this->diskon);
                    echo $_POST['name'] . " berstatus sebagai Member dan mendapat diskon sebesar 5% <br>";
                }else {
                    echo $_POST['name'] . " berstatus sebagai Non Member dan tidak mendapatkan diskon <br>";
                }
                
                echo "Jenis motor yang dirental adalah " . $pilihan . " selama $hari hari<br>";
                echo "harga rental per-harinya adalah : Rp. " . number_format($harga, 0, ',', '.') . "<br><br>";
                echo "besar yang harus di bayarkan adalah : Rp. " . number_format($result, 0, ',', '.');
        }
        }
?>