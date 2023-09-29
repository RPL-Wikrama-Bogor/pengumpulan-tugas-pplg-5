<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-gray-100">
    <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md">
        <form action="#" method="post">
            <label class="block mb-2">Nama</label>
            <input type="text" name="nama" class="w-full border rounded-md py-2 px-3 mb-3">

            <label class="block mb-2">Gaji Pokok</label>
            <input type="number" name="GP" class="w-full border rounded-md py-2 px-3 mb-3">

            <input type="submit" value="Send" name="kirim" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
        </form>
    </div>
</body>

</html>

<?php 


if(isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $gaji_pokok = $_POST['GP'];

    $tunj = (int)((20/100) * $gaji_pokok);
    $pjk = (int)((15/100) * ($gaji_pokok + $tunj));
    $gaji_bersih = (int)($gaji_pokok + $tunj - $pjk);

    echo "Nama karyawan : ". $nama. "Tunjangan adalah " . $tunj . " Pajak adalah " . $pjk . " Gaji bersih adalah " . $gaji_bersih;
}