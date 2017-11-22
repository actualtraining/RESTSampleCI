<?php

require APPPATH."libraries/REST_Controller.php";

class SampleApi extends REST_Controller {
    function __construct(){
        parent::__construct();
    }

    /*public function index_get($id,$nama){
        $data = array("Nim"=>"78987898",
        "Nama"=>$nama,"Id"=>$id);
        return $this->response($data,200);
    }*/

    /*public function index_get(){
        //$data = array("budi","bambang","joni","joko");
        $data = array(array("Nim"=>"78999898","Nama"=>"Erick"),
        array("Nim"=>"89898765","Nama"=>"Budi"));
        return $this->response($data,200);
    }*/

    public function index_get(){
        $nim = $this->get('nim');
        $nama = $this->get('nama');

        $data = array("Nim"=>$nim,"Nama"=>$nama);
        return $this->response($data,200);
    }

    //untuk insert data
    public function index_post(){
        $nim = $this->post('nim');
        $nama = $this->post('nama');
        $alamat = $this->post('alamat');

        return $this->response("Data ".$nim." berhasil ditambah !",200);
    }

    //untuk edit data
    public function index_put(){
        $nim = $this->put('nim');
        $nama = $this->put('nama');
        $alamat = $this->put('alamat');

        $result = "Berhasil mengupdate data ".$nim.", ".$nama.",  ".$alamat;
        return $this->response($result,200);
    }
}


?>