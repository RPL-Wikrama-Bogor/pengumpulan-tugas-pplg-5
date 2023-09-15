<?php

$siswa =
[ [

    "nama" => "Fema",
    "nis" => 1190754,
    "rombel" =>  "pplg XI-2",
    "umur" => 18,
    "jk" => "perempuan",

],[


    "nama" => "istaq",
    "nis" => 11567777,
    "rombel" =>  "pplg XI-8",
    "umur" => 34,
    "jk" => "lelaki",

],[
 

    "nama" => "ahmad",
    "nis" => 11089897,
    "rombel" =>  "pplg XI-9",
    "umur" => 20,
    "jk" => "lelaki",

],[
 

    "nama" => "Dion",
    "nis" => 12208977,
    "rombel" =>  "pplg XI-5",
    "umur" => 15,
    "jk" => "lelaki",

 ]
];
$pr=0;
$lk=0;
echo "siswa keseluruhan" . count($siswa) . "<br>";
foreach($siswa as $siswa)
{
    if($siswa["jk"] == "lelaki"){
        $lk++;
    }elseif($siswa["jk"]== "perempuan"){
        $pr++;
    }

   


}
echo "laki laki ada :".$lk."<br>";
echo "perempuan ada :".$pr."<br>";