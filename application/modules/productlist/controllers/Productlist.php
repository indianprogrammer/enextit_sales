<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productlist extends MY_Controller {

    public function __Construct() {
        parent::__Construct();
    }
    
    public function index(){

        $data['name'] = 'master123';
        $this->loadTemplate('productlist', $data);
    }

}

?>