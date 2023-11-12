<?php

class Home extends Controller {
    public function index()
    {
        $data['nama_peminjam'] = 'home';
        $this->view('templates/header', $data);
        $this->view('home/index');
        $this->view('templates/footer');
    }
}   