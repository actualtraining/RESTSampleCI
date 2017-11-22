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

    
}


?>