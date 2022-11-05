<?php
class Home extends controller {
    public function index(){
        $data['judul'] =  'Menu utama';
        $this->view('templates/header', $data);
        $this->view('home/index');
    }
}