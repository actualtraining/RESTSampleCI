<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH."libraries/REST_Controller.php";

class Mahasiswa extends REST_Controller{
    function __construct(){
        parent::__construct();
        
        /*$headers = $this->input->request_headers();
        if(Authorization::tokenIsExist($headers)){
            $token = Authorization::validateToken($headers['Authorization']);
            if($token == false){
                $response = ['status'=>REST_Controller::HTTP_FORBIDDEN,
                'message'=>"Forbidden"];
                $this->set_response($response,REST_Controller::HTTP_FORBIDDEN);
            }
        }
        else {
            die('Forbidden');
        }*/ 
        
    }

    //untuk menquery data
    public function index_get(){
        $headers = $this->input->request_headers();
        if(Authorization::tokenIsExist($headers)){
            $token = Authorization::validateToken($headers['Authorization']);
            if($token != false){
                $nim = $this->get('nim');
                if($nim==''){
                    $data = $this->db->get('mahasiswa')->result();
                }else{
                    $this->db->where('nim',$nim);
                    $data = $this->db->get('mahasiswa')->result();
                }
                return $this->response($data,200);
                
                //return $this->response($token->id,200);
            }
        }
        $response = ['status'=>REST_Controller::HTTP_FORBIDDEN,
        'message'=>"Forbidden"];
        $this->set_response($response,REST_Controller::HTTP_FORBIDDEN);
    }

    //menambahkan data mahasiswa
    public function index_post(){
        $headers = $this->input->request_headers();
        if(Authorization::tokenIsExist($headers)){
            $token = Authorization::validateToken($headers['Authorization']);
            if($token != false){
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
        $response = ['status'=>REST_Controller::HTTP_FORBIDDEN,
        'message'=>"Forbidden"];
        $this->set_response($response,REST_Controller::HTTP_FORBIDDEN);
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