<!DOCTYPE html>
<html>
<head>
    <title>Input no golongan</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #008080;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
    padding: 20px;
}

h1 {
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"] {
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 14px;
}

input[type="submit"] {
    background-color: #4682B4;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #E1AEFF;
}

.result {
    margin-top: 20px;
    text-align: left;
}
</style>
</head>
<body>
    <center>
        <h1>Input no golongan</h1>
        <form action="" method="post">
            <label for="no_pegawai">No pegawai</label>
            <br><br>
            <input type="text" name="no_pegawai" required><br>
            <br>
            <input type="submit" value="Input">
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $no_peg = $_POST["no_pegawai"];
    $length = strlen($no_peg);

    if ($length == 11){
        $no_gol = substr($no_peg, 0,1);
        $tgl = substr($no_peg, 1,2);
        $bulan = substr($no_peg, 3,2);
        $tahun = substr($no_peg, 5,4);
        $no_urut = substr($no_peg, 9,2);

    if ($bulan == "01"){
        echo "Bulan januari";
    } 
    elseif ($bulan == "02"){
        echo "Bulan februari";
    }
    elseif ($bulan == "03"){
        echo "Bulan maret";
    }
    elseif ($bulan == "04"){
        echo "Bulat april";
    }
    elseif ($bulan == "05"){
        echo "Bulan mei";
    }
    elseif ($bulan == "06"){
        echo "Bulan juni";
    }
    elseif ($bulan == "07"){
        echo "Bulan juli";
    }
    elseif ($bulan == "08"){
        echo "Bulan agustus";
    }
    elseif ($bulan == "09"){
        echo "Bulan september";
    }
    elseif ($bulan == "10"){
        echo "Bulan oktober";
    }
    elseif ($bulan == "11"){
        echo "Bulan november";
    }
    else{
        echo "Bulan desember";
    }

    echo " No golongan: $no_gol<br>
            No urut: $no_urut <br>
            Tanggal lahir: $tgl <br>
            Bulan: $bulan <br>
            Tahun: $tahun";
            
    } 
    else {
        echo "No pegawai tidak sesuia";
    }
}
?>
