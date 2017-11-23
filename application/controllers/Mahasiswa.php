<?php

require APPPATH."libraries/REST_Controller.php";

class Mahasiswa extends REST_Controller{
    function __construct(){
        parent::__construct();
    }

    //untuk menquery data
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

    //menambahkan data mahasiswa
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

    public function index_put(){
        $nim = $this->put('nim');
        $nama = $this->put('nama');
        $email = $this->put('email');
        $ipk = $this->put('ipk');

        $data = array('nama'=>$nama,'email'=>$email,'ipk'=>$ipk);
        $this->db->where('nim',$nim);
        $update = $this->db->update('mahasiswa',$data);
        if($update){
            $this->response($data,200);
        }else {
            $this->response(array('status'=>'fail',502));
        }
    }

    public function index_delete(){
        $nim = $this->delete('nim');
        $this->db->where('nim',$nim);
        $delete = $this->db->delete('mahasiswa');
        if($delete){
            $this->response(array('status'=>'success'),201);
        }else {
            $this->response(array('status'=>'fail',502));
        }
    }

}