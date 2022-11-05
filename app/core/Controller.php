<?php
class Controller {

    //method untuk memanggil views dan kirim data
    public function view($view , $data=[]){
       require_once '../app/views/'.$view.'.php'; 
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    } 


}