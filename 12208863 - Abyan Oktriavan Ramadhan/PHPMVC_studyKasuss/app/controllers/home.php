<?php 
 class home extends controller{
    public function index(){
        $data['nama'] = 'byan';
        $data['perkerjaan'] = 'pelajar';
        $data['judul'] = 'home';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
 }
?>