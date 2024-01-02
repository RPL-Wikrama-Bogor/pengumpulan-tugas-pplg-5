<?php 

class Home  extends Controller{
    public function index()
    {
        $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
 
    public function page()
    {
        $data['page'] = 'pinjam Buku';
        $data['pinjam'] = $this->model('PinjamModel')->getAllBuku();
        $this->view('templates/header', $data);
        $this->view('home/page', $data);
        $this->view('templates/footer');
    }
    public function edit($id){
        
        $data['pinjam'] = $this->model('PinjamModel')->getBukuById($id);
        $this->view('templates/header', $data);
        $this->view('home/edit', $data);
        $this->view('templates/footer');
        
    }

    public function tambah()
    {
        if ($this->model('PinjamModel')->tambahBuku($_POST) > 0 ) {
            header('location: '. BASE_URL . '/home/page');
            exit;
        } else {
            header('location: '. BASE_URL. '/home/page');
            exit;
        }
       
    }
    public function hapus($id){
        if ($this->model('PinjamModel')->deleteBuku($id) > 0) {
            header('location: '.BASE_URL. '/home/page');
            exit;
        } else {
            header('location: '. BASE_URL .'/home/page');
            exit;
        }
    }
    public function cari(){
        $data['page'] = 'data Buku';
        $data['pinjam'] = $this->model('PinjamModel')->cariBuku($_POST['search']);
        $this->view('templates/header', $data);
        $this->view('home/page', $data);
        $this->view('templates/footer');
    }
    public function update()
    {
        if ($this->model('PinjamModel')->updateDataBuku($_POST) > 0 ) {
            header('location: '. BASE_URL. '/home/page');
            exit;
        }else{
            header('location: '. BASE_URL. '/home/page');
            exit;
        }
    }



}