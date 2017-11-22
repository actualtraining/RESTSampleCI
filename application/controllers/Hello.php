<?php

class Hello extends CI_Controller{
    public function index($id,$nama){
        echo "ID anda ".$id." dan nama ".$nama;
    }

    public function about(){
        $this->load->view("about");
    }
}

?>