<?php

class App {

    //metod constrak berjalan di awal aplikasi dijalankan .. lai jaleh diang tu

    /*
        jadi ceritanya kan gini -> setelah URL sudah dipecah mengunakan explode
        nah array nya kita jadikan 
        $url[0] = home    => ini kita jadikan controllers 
        $url[1] = index  => ini method 
        $url[2] = satu  => ini kita jadikan data
        $url[3] = dua => ini kita jadikan data   
    */


    protected $controller = 'Home';  // controllers default kita bim 
    protected $method = 'index'; // ini method default kita 
    protected $params = []; // ini untuk data menamppung data yang nanti akan kita gunakan , ntah itu edit data , lihat , or simpan . dll lah .. you know lah ....

    
    public function __construct()
    {
        $url = $this->parseURL();  // variabel url di isi dengan metod parsing URL untuk menjalankan parsing URL..
        

        // ***** Controllers

        if($url == NULL)
			{
				$url = [$this->controller]; // jika url null pakai controller default
			}

        /*
            1. cek jika ada file yang ada di file controllers sesui URL
            2. jika ada timpa url default dengan url controller yang 
            3. hilangkan controller dari element array
        */
        if (file_exists('../app/controllers/' . $url[0] . '.php')){
            $this->controller = $url[0];
            unset ($url[0]);
        
        }

        require_once '../app/controllers/'.$this->controller.'.php'; //panggil controllers
        $this->controller = new $this->controller; //intansiasi controller

        


        // ***** method
        if(isset($url[1])){ // cek url 1 jika ada , jika tidak pake ygn default
            if(method_exists($this->controller , $url[1])){ // cek method jika ada  
                $this->method = $url[1];  // timpa url dengan yang baru
                unset($url[1]); // hilangkan method nya di element array
            }
        }


        // ***** Params
        if(!empty($url)){
            $this->params = array_values($url); // ambil sisa array masukan ke parameter
        }


        /**
         * jalankan controllers dan method, serta kirimkan params jika ada
         */

         call_user_func_array([$this->controller , $this->method] , $this->params);
    }

    // ini parsing URL BIMA ganteng ..
    public function parseURL(){
        
        if(isset($_GET['url'])){ //cek URL
            $url = rtrim($_GET['url'], '/');  // jika ada URL masukan ke varial url .. & rtrim -> untuk menghilangkan tanda / di akhir url
            $url = filter_var($url , FILTER_SANITIZE_URL); // ini membersihkan url dari karakter haram , .. wkwwkwk
            $url = explode('/' ,  $url);  // pacah URL dengan explode .. 
            return $url;  
        }
    }

} 