<?php
$siswa = [
  [
    "nama" => "sufyan",
    "nis" => "12209443",
    "rombel" => "pplgxi5",
    "umur" => "16",
    "jk" => "laki-laki",
  ],
  [
    "nama" => "fauzan",
    "nis" => "12209334",
    "rombel" => "pplgxi5",
    "umur" => "16",
    "jk" => "laki-laki",
  ],
  [
    "nama" => "jepri",
    "nis" => "12201212",
    "rombel" => "pplgxi5",
    "umur" => "16",
    "jk" => "laki-laki",
  ],
  [
    "nama" => "dion",
    "nis" => "12211223",
    "rombel" => "pplgxi5",
    "umur" => "16",
    "jk" => "laki-laki",
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
    <?php
    foreach ($siswa as $s) {
      echo "<li>" . $s["nis"]  . "</li>";
    }
    ?>
  </ol>
</body>

</html>