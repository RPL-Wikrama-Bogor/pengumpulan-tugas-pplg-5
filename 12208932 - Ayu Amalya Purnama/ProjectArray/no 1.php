$no = 1 ;
foreach ($siswa as $data) {
    if ($data["umur"] >= 17) {
        echo $no .". ". $data["nis"] ." ". $data["nama"] ." ". $data["umur"]. "<br>";
        $no ++ ;
    } 
}