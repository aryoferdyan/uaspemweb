<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cuti_model extends CI_Model
{

    public $table = 'cuti';
    public $id = 'id_cuti';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_cuti,id_karyawan,tanggal1,tanggal2,id_jenis,status,validasi');
        $this->datatables->from('cuti');
        //add this line for join
        //$this->datatables->join('table2', 'cuti.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('cuti/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('cuti/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('cuti/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_cuti');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_cuti', $q);
	$this->db->or_like('id_karyawan', $q);
	$this->db->or_like('tanggal1', $q);
	$this->db->or_like('tanggal2', $q);
	$this->db->or_like('id_jenis', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('validasi', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_cuti', $q);
	$this->db->or_like('id_karyawan', $q);
	$this->db->or_like('tanggal1', $q);
	$this->db->or_like('tanggal2', $q);
	$this->db->or_like('id_jenis', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('validasi', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Cuti_model.php */
/* Location: ./application/models/Cuti_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-14 15:08:04 */
/* http://harviacode.com */