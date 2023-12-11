<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $data['judul'] = 'Page';
        $data['gambar'] = 'sya.jpeg';
        $data['nama'] = 'Insya Mada Wirda';
        $data['pekerjaan'] = 'programmer';
        $this->view('templates/header', $data);
        $this->view('home/page', $data);
        $this->view('templates/footer');
    }
}
