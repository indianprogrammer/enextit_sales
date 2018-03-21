<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Capative_portal extends MX_Controller {

    private $uamsecret = '123456';
    private $userpassword = 1;

    public function __Construct() {
        parent::__Construct();
        //$this->load->model('Token_model');
    }

    public function index() {
        #collect get requestes
        $res = $this->input->get('res');
        $uamip = $this->input->get('uamip');
        $uamport = $this->input->get('uamport');
        $challenge = $this->input->get('challenge');
        $called = $this->input->get('called');
        $mac = $this->input->get('mac');
        $ip = $this->input->get('ip');
        $nasid = $this->input->get('nasid');
        $userurl = $this->input->get('userurl');
        $md = $this->input->get('md');

        $loginData = array(
            'title' => 'ISPjet Portal',
            'uamip' => $uamip,
            'uamport' => $uamport,
            'userurl' => $userurl,
            'challenge' => $challenge
        );
        switch ($res) {
            case 'success':
            case 'already':
                #show success page with logoff link
                $this->load->view('already_login', $loginData);
                break;

            case 'failed':
                #show error msg with login page                
                $loginData['msg']='login failed';                
                $this->load->view('login', $loginData);
                break;

            case 'notyet':
            case 'logoff':
                $this->load->view('login', $loginData);
                break;

            default:
                
                break;
        }
    }

    public function login_action() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $challenge = $this->input->post('challenge');
        $uamip = $this->input->post('uamip');
        $uamport = $this->input->post('uamport');
        $userurl = $this->input->post('userurl');
        $button = $this->input->post('button');

        $loginData = array(
            'title' => 'Login ISPjet',
            'uamip' => $uamip,
            'uamport' => $uamport,
            'userurl' => $userurl,
            'username' => $username,
            'password' => $password,
            'uamsecret' => $this->uamsecret,
            'challenge' => $challenge
        );
        //var_dump($loginData);
        $this->load->view('loggingin', $loginData);
    }

    public function popup_login($uamip, $uamport) {
        echo 'logging in please wait...' . "$uamip, $uamport";
    }

}

?>