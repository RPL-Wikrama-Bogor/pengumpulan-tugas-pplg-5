<?php
$siswa = [
  [
    "nama" => "sufyan",
    "nis" => "12209443",
    "rombel" => "pplgxi5",
    "umur" => "16",
    "jk" => "laki",
  ],
  [
    "nama" => "fauzan",
    "nis" => "12209334",
    "rombel" => "pplgxi5",
    "umur" => "16",
    "jk" => "laki",
  ],
  [
    "nama" => "jepri",
    "nis" => "12201212",
    "rombel" => "pplgxi5",
    "umur" => "16",
    "jk" => "laki",
  ],
  [
    "nama" => "dion",
    "nis" => "12211223",
    "rombel" => "pplgxi5",
    "umur" => "16",
    "jk" => "perempuan",
  ]

];

// munculkan 
$laki = 0;
$perempuan = 0;
foreach ($siswa as $s) {
  if ($s['jk'] == "laki") {
    $laki++;
  } else {
    $perempuan++;
  }
}

echo "Laki : " . $laki;
echo "<br>";
echo "Perempuan : " . $perempuan;
echo "<br>";
echo "Jumlah seluruh siswa " . count($siswa);
