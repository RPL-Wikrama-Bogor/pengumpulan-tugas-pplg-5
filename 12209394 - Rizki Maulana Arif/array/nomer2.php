<?php
$siswa = [
    [

    "nama" => "Rizki",
    "nis" => "12209394",
    "rombel" => "pplg xi-5",
    "umur" => 18,
    "jk" => "perempuan",
    ],
    [

    "nama" => "Sufyam",
    "nis" => "12209391",
    "rombel" => "pplg xi-2",
    "umur" => 90,
    "jk" => "laki-laki",
    ],
    [

    "nama" => "Angger",
    "nis" => "12209994",
    "rombel" => "pplg xi-1",
    "umur" => 8,
    "jk" => "perempuan",
    ],
    [

    "nama" => "Okta",
    "nis" => "12209395",
    "rombel" => "pplg xi-1",
    "umur" => 18,
    "jk" => "perempuan",
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
    <ol>
    <?php foreach ($siswa as $s):?>

        <li>
        
     <?= $s['nis'] . " - " . $s["nama"]. " - " .strtoupper($s['rombel']) . "<br>"; ?>
        </li>

        <?php endforeach?>
    </ol>
</body>
</html>



