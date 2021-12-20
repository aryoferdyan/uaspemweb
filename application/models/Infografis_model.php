<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Infografis_model extends CI_Model
{

    public $table = 'presensi';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('*');
        $this->datatables->from('presensi');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_user_level.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('userlevel/akses/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm')) . " 
            " . anchor(site_url('userlevel/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm')) . " 
                " . anchor(site_url('userlevel/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_user_level');
        return $this->datatables->generate();
    }

}