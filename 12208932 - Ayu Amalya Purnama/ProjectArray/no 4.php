<?php$no = 1 ;
foreach ($siswa as $data) {
    if ($data["umur"] >= 17) {
        echo $no .". ". $data["nis"] ." 12208932". $data["nama"] ."ayu ". $data["umur"]. "<br>";
        $no ++ ;
    } 
}