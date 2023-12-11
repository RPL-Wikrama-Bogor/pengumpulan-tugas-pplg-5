<?php 

class Home  extends Controller{
    public function index()
    {
        $data['nama_peminjam'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

//     public function page()
//     {
//         $data['judul'] = 'Page';
//         $data['gambar'] = 'red.jpeg';
//         $data['nama'] = 'mayra';
//         $data['pekerjaan'] = 'Pelajar';
//         $this->view('templates/header', $data);
//         $this->view('home/page', $data);
//         $this->view('templates/footer');
//     }
}