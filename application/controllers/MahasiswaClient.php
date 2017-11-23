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

    public function create(){
        if(isset($_POST['submit'])){
            $nim = $this->input->post('nim');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $ipk = $this->input->post('ipk');
            $data = array('nim'=>$nim,'nama'=>$nama,
            'email'=>$email,'ipk'=>$ipk);

            $insert = $this->curl->simple_post($this->API."/Mahasiswa",$data,
            array(CURLOPT_BUFFERSIZE=>10));
            if($insert){
                $this->session->set_flashdata('hasil',
                    'Tambah data mahasiswa berhasil');
            }else {
                $this->session->set_flashdata('hasil',
                    'Gagal untuk tambah data');
            }
            redirect('MahasiswaClient');
        }else {
            $this->load->view('mahasiswa_create');
        }
    }


    public function edit(){
        if(isset($_POST['submit'])){
            $nim = $this->input->post('nim');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $nik = $this->input->post('nik');
            $data = array('nim'=>$nim,'nama'=>$nama,'email'=>$email,'ipk'=>$ipk);
            $update = $this->curl->simple_put($this->API."/Mahasiswa",$data,
            array(CURLOPT_BUFFERSIZE=>10));
            if($update){
                $this->session->set_flashdata('hasil','update data mahasiswa berhasil !');           
            } else {
                $this->session->set_flashdata('hasil','Update data gagal..');
            }
            redirect('MahasiswaClient');
        }
        else {
            $params = array('nim'=>$this->uri->segment(3));
            $data['mahasiswa'] = json_decode(
                $this->curl->simple_get($this->API."/Mahasiswa",$params));
                $this->load->view('mahasiswa_edit',$data);
        }
    }
    
}

?>