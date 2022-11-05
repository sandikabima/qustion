<?php
class Morning extends controller{
    public function index(){
        $data ['judul'] =  'List Morning';
        $data['morning'] = $this->model('Morning_model')->getAllMorning();
        $this->view('templates/header', $data);
        $this->view('morning/index',$data);
        $this->view('templates/footer');
    }

    public function tambah_rajal($id){
        $data ['judul'] = 'Menu Rajal';
        $data['morning'] = $this->model('Morning_model')->getMorningById($id);
        $this->view('templates/header',$data);
        $this->view('morning/rajal',$data);
        $this->view('templates/footer');
    }

    public function tambah(){
        if ($this->model('Morning_model')->tambahDataMorning($_POST) > 0 ){
            Flasher::setFlash(' berhasil','ditambahkan','success');
            header('Location: ' . BASEURL . '/Morning');
            exit;
        }else{
            Flasher::setFlash(' gagal',' ditambahkan','danger');
            header('Location: ' . BASEURL . '/Morning');
            exit;
        }
    }
    
    public function hapus($id){
        if($this->model('Morning_model')->hapusDataMorning($id) > 0 ){
            Flasher::setFlash(' berhasil','dihapus', 'success');
            header('Location: ' . BASEURL . '/Morning');
            exit;

        }else{
            Flasher::setFlash(' gagal','dihapus','danger');
            header('Location: ' . BASEURL . '/Morning');
            exit; 
        }
    }

    public function getubah(){
        echo json_encode($this->model('Morning_model')->getMorningById($_POST['id']));
    }

    public function ubah(){
        if ($this->model('Morning_model')->ubahDataMorning($_POST) > 0 ){
            Flasher::setFlash(' berhasil','diubah','success');
            header('Location: ' . BASEURL . '/Morning');
            exit;
        }else{
            Flasher::setFlash(' gagal',' diubah','danger');
            header('Location: ' . BASEURL . '/Morning');
            exit;
        }
    }

    public function cari(){
        $data['judul'] = 'list Morning';
        $data['morning'] = $this->model('Morning_model')->cariDataMorning();
        $this->view('templates/header' , $data);
        $this->view('morning/index', $data);
        $this->view('templates/footer');
    }
}