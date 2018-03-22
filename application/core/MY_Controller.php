<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

    public function __Construct() {
        parent::__Construct();
    }
    
    public function loadTemplate($view, $param) {
        $param['content'] = $view;
        $this->load->view('template/master', $param);
    }

}