<?php

require APPPATH."libraries/REST_Controller.php";

class Mahasiswa extends REST_Controller{
    function __construct(){
        parent::__construct();
    }

    public function index_get(){
        $nim = $this->get('nim');
        if($nim==''){
            $data = $this->db->get('mahasiswa')->result();
        }else{
            $this->db->where('nim',$nim);
            $data = $this->db->get('mahasiswa')->result();
        }
        
        return $this->response($data,200);
    }
}