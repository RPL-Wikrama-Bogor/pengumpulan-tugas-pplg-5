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

// munculkan 

foreach ($siswa as $s) {

  echo $s['nama'] . " - " . $s['nis'] . " - " . strtoupper($s['rombel']) . "<br>";
}
