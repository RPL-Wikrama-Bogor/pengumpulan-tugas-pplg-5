<?php

class home extends controller {
 public function index()
{
$data['judul '] = ' Home';
$this->view('templates/header', $data);
$this->view('home/index');
$this->view('templates/footer');

}

public function page()
{
$data['judul'] = ' Page';
$data['gambar'] = 'qomar1.png';
$data['nama'] = 'Qomarullah';
$data['pekerjaan'] = 'RW gagal';
$this->view('templates/header', $data);
$this->view('home/page',$data);
$this->view('templates/footer');
}
}
// class home{
//     public function index($nama = 'jojo' , $pekerjaan = 'laboran'){
//         echo "hallo , Nama saya $nama dan saya merupakan seorang $pekerjaan";
//     }
// }