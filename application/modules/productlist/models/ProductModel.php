<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProductModel extends CI_Model {

    private $productTable = 'products';

    function __construct() {
        parent::__construct();
    }

    function getProducts() {
        $query = $this->db->get($this->productTable)
                ->result_array();
        return $query;
    }

}

?>