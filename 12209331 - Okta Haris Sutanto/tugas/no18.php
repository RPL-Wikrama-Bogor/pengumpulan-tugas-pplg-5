<!DOCTYPE html>
<html>
<head>
    <title>Hasil Penilaian</title>
</head>
<style>
    body{
        display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-color: #f0f0f0;   
}
    .card, 
    .hasilPenilaian {
    justify-content: center;
    height: 254px;
    background: white;
    width: 97rem; /* Adjusted width */
    position: relative;
    flex-direction: column;
    align-items: center; /* Adjusted alignment */   
    border-radius: 20px;
    padding: 20px; /* Added padding */
}

.shadow {
 box-shadow: inset 0 -3em 3em rgba(0,0,0,0.1),
             0 0  0 2px rgb(190, 190, 190),
             0.3em 0.3em 1em rgba(0,0,0,0.3);
}
.card h1{
    z-index: 1;
    font-size: 2em;
  }
  .card form {
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 2;
  }
  .card label {
    font-weight: bold;
    margin-bottom: 8px;
  }
  .card input[type="text"] {
    width: 80%;
    padding: 8px;
    border-radius: 4px;
    margin-bottom: 10px;
  }
  .card button {
    background-color: #3498db;
    color: navy;
    border: none;
    border-radius: 4px;
    padding: 8px 16px;
    cursor: pointer;
  }


  table, th, td {
  /* border: 1px solid white; Ubah warna garis tabel menjadi putih */
}
</style>
<body>
    <div class="card shadow">
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <div id="wrap">
        <div style="display: flex; width: fit-content;">
            <label for="nama">Masukan nama:</label><br>
            <input type="text" name="nama[]"required autofocus><br><br>
            
            <label for="kehadiran">Masukan kehadiran:</label><br>
            <input type="text" name="kehadiran[]" required autofocus 
            maxlength="3"><br><br>

            <label for="mtk">Nilai Mtk:</label><br>
            <input type="text" name="nilai_mtk[]" required 
            maxlength="3"><br><br>
            
            <label for="indo">Nilai Indo:</label><br>
            <input type="text" name="nilai_indo[]" required
            maxlength="3"><br><br>
    
            <label for="ing">Nilai_ing:</label><br>
            <input type="text" name="nilai_ing[]" required
            maxlength="3"><br><br>

            <label for="dpk">nilai_dpk:</label><br>
            <input type="text" name="nilai_dpk[]" required
            maxlength="3"><br><br>

            <label for="agama">agama:</label><br>
            <input type="text" name="agama[]" required
            maxlength="3"><br><br>        </div>
    </div>
    <p style="cursor: pointer; color: blue;" onclick="tambahInput()">Tambah Input Form</p>
    <button name="submit" type="submit">Submit</button><br>
</form>
</div>
<script>
let jumlahInput = 1;
            
                function tambahInput() {
                  if (jumlahInput < 10) {
                    let inputElement = `
                                <br><div style="display: flex; width: fit-content;">
                                <label for="nama">Nama: </label>
                                <input type="text" name="nama[]" required>
                                <label for="kehadiran">Input Kehadiran: </label>
                                <input type="text" name="kehadiran[]" required 
                                maxlength="3">
                                <label for="mtk">MTK: </label>
                                <input type="text" name="nilai_mtk[]" required 
                                maxlength="3">
                                <label for="indo">Indo: </label>
                                <input type="text" name="nilai_indo[]" required 
                                maxlength="3">
                                <label for="ing">Ing: </label>
                                <input type="text" name="nilai_ing[]" required 
                                maxlength="3">
                                <label for="dpk">DPK: </label>
                                <input type="text" name="nilai_dpk[]" required 
                                maxlength="3">
                                <label for="agama">Agama: </label>
                                <input type="text" name="agama[]" required 
                                maxlength="3">
                            </div>`;
                    document.getElementById('wrap').innerHTML += inputElement;
                    jumlahInput++;
                  }
                }</script>

<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $hadir = $_POST['kehadiran'];
    $mtk = $_POST['nilai_mtk'];
    $indo = $_POST['nilai_indo'];
    $ing = $_POST['nilai_ing'];
    $dpk = $_POST['nilai_dpk'];
    $agama = $_POST['agama'];

    $data = [];
    $jumlahData = count($nama);

    for ($i = 0; $i < $jumlahData; $i++) {
        $data[$i] = [
            'nama' => $nama[$i],
            'kehadiran' => $hadir[$i],
            'nilai_mtk' => $mtk[$i],
            'nilai_indo' => $indo[$i],
            'nilai_ing' => $ing[$i],
            'nilai_dpk' => $dpk[$i],
            'agama' => $agama[$i]
        ];
    }

    $totalData =
        array_sum(array_column($data, 'nilai_mtk')) +
        array_sum(array_column($data, 'nilai_indo')) +
        array_sum(array_column($data, 'nilai_ing')) +
        array_sum(array_column($data, 'nilai_dpk')) +
        array_sum(array_column($data, 'agama'));

    $rataRata = round($totalData / (count($data) * 5));

    echo "Total Data: $totalData<br>";

    // ... (displaying attendance and other calculations)$dataKehadiran = [];
echo "<p>Daftar Kehadiran:</p>";
foreach ($data as $item) {
    echo "{$item['nama']} ";
    echo "Total Nilai: " . ($item['nilai_mtk'] + $item['nilai_indo'] + $item['nilai_ing'] + $item['nilai_dpk'] + $item['agama']) . "<br>";
    $dataKehadiran[] = $item['kehadiran'];
}

$rataRataKehadiran = round(array_sum($dataKehadiran) / count($dataKehadiran));

    // Sort the data based on total nilai in descending order
    usort($data, function($a, $b) {
        $totalA = $a['nilai_mtk'] + $a['nilai_indo'] + $a['nilai_ing'] + $a['nilai_dpk'] + $a['agama'];
        $totalB = $b['nilai_mtk'] + $b['nilai_indo'] + $b['nilai_ing'] + $b['nilai_dpk'] + $b['agama'];
        return $totalB - $totalA;
    });

    // Filter and display only juara who meet the condition
    $juara = array_filter($data, function($item) use ($rataRata) {
        return $rataRata >= 80 && $item['kehadiran'] == 100;
    });

    // Display table with results
    echo '<div class="hasilPenilaian">';
    echo '<h1>Hasil Penilaian</h1>';
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Urutan</th>';
    echo '<th>Nama</th>';
    echo '<th>Kehadiran</th>';
    echo '<th>MTK</th>';
    echo '<th>Indo</th>';
    echo '<th>Inggris</th>';
    echo '<th>DPK</th>';
    echo '<th>Agama</th>';
    echo '</tr>';

    // Loop through juara data and display rows
    foreach ($juara as $index => $item) {
        echo '<tr>';
        echo '<td>' . ($index + 1) . '</td>';
        echo '<td>' . $item['nama'] . '</td>';
        echo '<td>' . $item['kehadiran'] . '%</td>';
        echo '<td>' . $item['nilai_mtk'] . '</td>';
        echo '<td>' . $item['nilai_indo'] . '</td>';
        echo '<td>' . $item['nilai_ing'] . '</td>';
        echo '<td>' . $item['nilai_dpk'] . '</td>';
        echo '<td>' . $item['agama'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '</div>';
}

}
?>
</body>
</html>
