<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Infografis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Infografis_model');
        $this->load->library('form_validation');        
	    //$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','infografis/index.php');
    } 
    
}