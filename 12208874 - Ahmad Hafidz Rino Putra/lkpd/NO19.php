<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Sales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <form action="#" method="post">
            <div class="mb-3">
                <label for="vip" class="form-label">Tiket VIP</label>
                <input type="number" class="form-control" id="vip" name="vip" min="1" max="50">
            </div>
            <div class="mb-3">
                <label for="eks" class="form-label">Tiket Eksekutif</label>
                <input type="number" class="form-control" id="eks" name="eks" min="1" max="50">
            </div>
            <div class="mb-3">
                <label for="eko" class="form-label">Tiket Ekonomi</label>
                <input type="number" class="form-control" id="eko" name="eko" min="1" max="50">
            </div>
            <button type="submit" class="btn btn-primary" name="kirim">Send</button>
        </form>
        <?php 
        
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-xxxxxx" crossorigin="anonymous"></script>
</body>
</html>


<?php 

if(isset($_POST['kirim'])) {
    $vip = $_POST["vip"];  
    $eks = $_POST["eks"];   
    $eko = $_POST["eko"];
    

    if($vip >= 35  ) {
        $keuntungan_vip = 25/100;
    } elseif ($vip < 35 && $vip >= 20) {
        $keuntungan_vip = 15/100;
    }else {
        $keuntungan_vip = 5/100;
    }

    if($eks >= 40){
        $keuntungan_eks = 20/100;
    } elseif ($eks >= 20 && $eks < 40) {
        $keuntungan_eks = 10/100;
    } else {
        $keuntungan_eks =  2/100;
    }

    $keuntungan_eko = 7/100;

    

    $keuntungan_seluruh = $keuntungan_vip + $keuntungan_eks + $keuntungan_eko;
    $total_tiket = $vip + $eks + $eko;

    echo "jumlah yang terjual adalah ". $total_tiket . '<br>';
    echo "Keuntungan VIP ". $keuntungan_vip . '<br>';
    echo "Keuntungan EKSEKUTIF ". $keuntungan_eks. '<br>';
    echo "Keuntungan EKONOMI ". $keuntungan_eko.'<br>';
    echo " Keuntungan seluruhnya adalah ". $keuntungan_seluruh.'<br>';
}