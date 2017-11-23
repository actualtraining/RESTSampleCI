<?php

class MahasiswaClient extends CI_Controller{
    var $API = "";
    function __construct(){
        parent::__construct();
        $this->API = "http://localhost/restapi/index.php";
    }

    public function index(){
        //cara pertama tanpa menggunakan curl
        /*$data['mahasiswa'] =  
        json_decode(file_get_contents("http://localhost/restapi/index.php/Mahasiswa"));*/

        $data['mahasiswa'] = json_decode(
            $this->curl->simple_get($this->API."/Mahasiswa"));
        
        return $this->load->view('mahasiswa_list',$data);
    }
}

?>