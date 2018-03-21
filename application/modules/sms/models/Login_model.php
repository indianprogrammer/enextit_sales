<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Login_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }


  function checkAuth($username,$password){
    return $this->db->select('type')
    ->from('auth')
    ->where('username',$username)
    ->where('password',md5($password))
    ->where('status','enable')
    ->get()->row();
  }
  
}
?>