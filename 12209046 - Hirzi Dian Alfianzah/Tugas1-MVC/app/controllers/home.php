<?php

class Home extends Controller{
    public function index()
    {
        $data['judul'] = 'Home';
        $this->view('templates/header' , $data);
        $this->view('home/index' , $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $data['judul'] = 'page';
        $data['gambar'] = 'img.jpg';
        $data['nama'] = 'Hirzi';
        $data['pekerjaan'] = 'Kerja';
        // print_r($data);
        $this->view('templates/header' , $data);
        $this->view('home/page' , $data);
        $this->view('templates/footer');
    }
}