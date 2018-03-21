<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends MX_Controller {

    private $uamsecret = '123456';
    private $userpassword = 1;
    private $loginpath = '/';

    public function __Construct() {
        parent::__Construct();
        //$this->load->model('Login_model');
    }
    
    
    

    private function sendSms($param) {
        #actual SMS sender
    }
}

?>