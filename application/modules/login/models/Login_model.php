<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {

    private $userTable = 'users';

    function __construct() {
        parent::__construct();
    }

    function checkUserStatus($mobileNo) {
        $this->db->where('mobile', $mobileNo);
        $this->db->where('token_id IS NOT NULL', null,false);
        $query = $this->db->get($this->userTable);
        if ($query->num_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    function activateUser($mobileNo, $tokenId) {
        $userData = array(
            'mobile' => $mobileNo,
            'token_id' => $tokenId
        );
        #check for existing user
        $this->db->where('mobile', $mobileNo);
        $query = $this->db->get($this->userTable);

        if ($query->num_rows() > 0) {
            #if existing do update tokenID
            $this->db->where('mobile', $mobileNo);
            $this->db->update($this->userTable, $userData);
        } else {
            #if new insert new row
            $this->db->set('mobile', $mobileNo);
            $this->db->insert($this->userTable, $userData);
        }
    }

}

?>