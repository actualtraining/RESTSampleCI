<?php

require APPPATH."libraries/REST_Controller.php";

class Mahasiswa extends REST_Controller{
    function __construct(){
        parent::__construct();
    }

    public function index_get($nim){
        //$nim = $this->get('nim');
        if($nim==''){
            $data = $this->db->get('mahasiswa')->result();
        }else{
            $this->db->where('nim',$nim);
            $data = $this->db->get('mahasiswa')->result();
        }
        return $this->response($data,200);
    }

    public function index_post(){
        $nim = $this->post('nim');
        $nama = $this->post('nama');
        $email = $this->post('email');
        $ipk = $this->post('ipk');

        $data = array("nim"=>$nim,
        "nama"=>$nama,"email"=>$email,
        "ipk"=>$ipk);

        $result = $this->db->insert('mahasiswa',$data);
        if($result){
            return $this->response($data,200);
        }else {
            return $this->response(array("status"=>"gagal insert",502));
        }
    }

}