<?php

class MahasiswaClient extends CI_Controller{
    function __construct(){
        parent::__construct();
    }

    public function index(){
        $data = file_get_contents("http://localhost/restapi/index.php/Mahasiswa");
        $results = json_decode($data);

        echo var_dump($results);
    }
}

?>