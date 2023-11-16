    <?php
    $listfilm=[
        [
            "judul"=> " hantu rumah sakit",
            "min-usia" =>15,
            "harga" =>45000,
        ],[
            "judul"=> " hantu hutan kalimantan",
            "min-usia" =>18,
            "harga" =>35000,
        ]
        ,[
            "judul"=> " hantu jepang  ",
            "min-usia" =>30,
            "harga" =>25000,
        ]
        ];
        ?> 
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <form action="" method="post">
            <input type="number" name="usia" placeholder="masukan usia">
            <select name="judul_id" >
                <option disabled selected hidden> ......pilih judul....</option>
                <?php 
                foreach ($listfilm as $key => $sistem){
                    ?><option value="<?=$key ?>"><?= $sistem['judul']?></option>
                    <?php
                }
                ?>
            </select>
            <button type="submit" name="beli">belitiket</button>
        </form>
        <?php
        if (isset($_POST['beli']))
        {
            $usia = $_POST['usia'];
            $arrayid =$_POST['judul_id'];
            $minusia = $listfilm[$arrayid]
            ['min-usia'];
            $harga = $listfilm[$arrayid]
            ['harga'];

            if ($usia < $minusia) {
                echo "usia belum cukup";
            }else {
                echo "harga yang harus di bayar RP. " .number_format($harga,2 ,',','.');
            }

        }
        ?>
        </body>
        </html>
    