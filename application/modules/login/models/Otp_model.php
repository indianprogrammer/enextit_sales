<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Otp_model extends CI_Model {

    private $otpTable = 'otp';

    function __construct() {
        parent::__construct();
    }

    function varifyOtp($mobileNo, $otp) {
        $query = $this->db->get_where($this->otpTable, array(
            'mobile' => $mobileNo,
            'otp' => $otp
        ));
        if ($query->num_rows() === 0) {
            //otp mismatch
            return FALSE;
        }
        //otp matched so delete all otp records for that mobile number
        $this->db->delete($this->otpTable, array('mobile' => $mobileNo));
        return TRUE;
    }

    function getOtp($mobileNo) {
        #get last otp for that mobile no
        $query = $this->db->select('otp')
                ->order_by('date', 'DESC') //get newer otp
                ->get_where($this->otpTable, array('mobile' => $mobileNo));
        return $query->row();
    }

    function saveOtp($mobileNo, $otp) {
        $this->db->insert($this->otpTable, array(
            'mobile' => $mobileNo,
            'otp' => $otp
        ));
        return ($this->db->affected_rows() != 1) ? false : true;
    }

}

?>