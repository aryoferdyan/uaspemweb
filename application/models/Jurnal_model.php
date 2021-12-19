<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jurnal_model extends CI_Model
{

    public $table = 'jurnal';
    public $id = 'id_jurnal';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_jurnal,jurnal.id_presensi,isi,id_karyawan');
        $this->datatables->from('jurnal');
        $this->datatables->where('id_karyawan', $_SESSION['id_users']);
        //add this line for join
        //$this->datatables->join('table2', 'jurnal.field = table2.field');
        $this->datatables->join('presensi', 'jurnal.id_presensi = presensi.id_presensi');
        $this->datatables->add_column('action', anchor(site_url('jurnal/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('jurnal/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('jurnal/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_jurnal');
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
        $this->db->like('id_jurnal', $q);
	$this->db->or_like('id_presensi', $q);
	$this->db->or_like('isi', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_jurnal', $q);
	$this->db->or_like('id_presensi', $q);
	$this->db->or_like('isi', $q);
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

/* End of file Jurnal_model.php */
/* Location: ./application/models/Jurnal_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-19 03:11:31 */
/* http://harviacode.com */