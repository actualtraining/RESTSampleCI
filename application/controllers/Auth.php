<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH."libraries/REST_Controller.php";

class Auth extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_Model');
    }

    public function token_post(){
        $data = $this->input->post();
        $user = $this->User_Model->login($data['username'],
            $data['password']);
        if($user!=null){
            $tokenData = array();
            $tokenData['id'] = $user->username;
           
            $response['token'] = Authorization::generateToken($tokenData);
            $this->set_response($response,REST_Controller::HTTP_OK);
            return;
        }
        $response = ['status'=>REST_Controller::HTTP_UNAUTHORIZED,
        'message'=>'Unauthorize'];
        $this->set_response($response,REST_Controller::HTTP_UNAUTHORIZED);
    }
}

?>