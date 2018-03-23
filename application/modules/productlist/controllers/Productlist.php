<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productlist extends MY_Controller {

    public function __Construct() {
        parent::__Construct();
        $this->load->model('ProductModel');
    }
    
    public function index(){

        $productData = $this->ProductModel->getProducts();
        //var_dump($productData);
        $data['title'] = 'Product List';
        $data['name'] = 'master123';
        $data['products'] = $productData;
        
        $this->loadTemplate('productlist', $data);
    }

}

?>