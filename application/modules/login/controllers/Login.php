<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

    private $uamsecret = '123456';
    private $userpassword = 1;
    private $loginpath = '/';

    public function __Construct() {
        parent::__Construct();
        $this->load->model('Login_model');
        $this->load->model('Token_model');
        $this->load->model('Otp_model');
    }

    public function index() {
        $this->load->view('login');
    }

    public function index_bkp() {
        # Read form parameters which we care about
        $username = $this->input->post('UserName');
        $password = $this->input->post('Password');
        $challenge = $this->input->post('challenge');
        $button = $this->input->post('button');
        $logout = $this->input->post('logout');
        $prelogin = $this->input->post('prelogin');
        $res = $this->input->post('res');
        $uamip = $this->input->post('uamip');
        $uamport = $this->input->post('uamport');
        $userurl = $this->input->post('userurl');
        $timeleft = $this->input->post('timeleft');
        $redirurl = $this->input->post('redirurl');

        # Read query parameters which we care about
        $res = $this->input->get('res');
        $challenge = $this->input->get('challenge');
        $uamip = $this->input->get('uamip');
        $uamport = $this->input->get('uamport');
        $reply = $this->input->get('reply');
        $userurl = $this->input->get('userurl');
        $timeleft = $this->input->get('timeleft');
        $redirurl = $this->input->get('redirurl');


        $p1Data = [
            'chillispot' => 'ChilliSpot',
            'title' => 'title here',
            'wait_msg' => 'ChilliSpot',
            'login' => 'Login',
            'logout' => 'Logout'
        ];
        $this->load->view('p1_mobile', $p1Data);
    }

    #@ajax

    public function request_otp() {
        $mobileNo = $this->input->post('mobile_no');
        #generate random number
        $otp = rand(1100, 9999);
        #save it to database with mobile number
        $this->load->model('Otp_model');
        if ($this->Otp_model->saveOtp($mobileNo, $otp)) {
            #check if user expired or has plana  
            echo json_encode(['status' => $this->checkUserStatus($mobileNo), 'otp' => $otp]);
            #send it to mobile
        }
    }

    #@ajax    

    public function resend_otp() {
        $mobileNo = $this->input->post('mobile_no');
        #get otp from database
        $otp = $this->Otp_model->getOtp($mobileNo);
        if (is_null($otp)) {
            echo json_encode(['status' => FALSE,'msg' =>'Error occured']);
        } else {
            #send it to mobile
            echo json_encode(['status' => TRUE, 'otp' => $otp->otp]);
        }
    }

    #@ajax

    public function activate_plan() {
        $mobileNo = $this->input->post('mobile_no');
        $otp = $this->input->post('otp');
        $tokenNo = $this->input->post('token_no');
        #varify otp
        $flagOtp = $this->varifyOtp($mobileNo, $otp);
        if ($flagOtp) {
            #if correct otp then only varify token
            $flagToken = $this->varifyToken($tokenNo);
            if ($flagToken) {
                #activate user's plan
                $tokenId = $flagToken->id;
                $this->activateUserPlan($mobileNo, $tokenId);
            } else {
                echo json_encode(['status' => FALSE, 'msg' => 'invalid token']);
            }
        } else {
            echo json_encode(['status' => FALSE, 'msg' => 'incorrect OTP']);
        }
    }

    private function checkUserStatus($mobileNo) {
        return $this->Login_model->checkUserStatus($mobileNo);
    }

    private function activateUserPlan($mobileNo, $tokenId) {
        #user activation
        $this->Login_model->activateUser($mobileNo, $tokenId);
        $this->Token_model->setTokenUsed($tokenId);
    }

    private function varifyToken($tokenNo) {
        #check if token exist  and unused
        return $this->Token_model->varifyToken($tokenNo);
    }

    private function varifyOtp($mobileNo, $otp) {
        #varify otp and delete
        return $this->Otp_model->varifyOtp($mobileNo, $otp);
    }

}

?>