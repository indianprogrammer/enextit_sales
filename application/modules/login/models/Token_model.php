<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Token_model extends CI_Model {

    private $tokenTable = 'tokens';

    function __construct() {
        parent::__construct();
    }

    function varifyToken($tokenNo) {
        $query = $this->db->select('id')
                ->get_where($this->tokenTable, array(
            'token' => $tokenNo,
            'status' => 'unused'
        ));
        if ($query->num_rows() === 0) {
            //token not avilable
            return FALSE;
        }
        //token avilable and return token id        
        return $query->row();
    }

    function setTokenUsed($tokenId) {
        $this->db->where('id', $tokenId);
        $this->db->update($this->tokenTable, array('status'=> 'used'));
    }

}

?>