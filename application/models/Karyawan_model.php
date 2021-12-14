<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{

    public $table = 'karyawan';
    public $id = 'id_karyawan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
        $this->db->join('karyawan_jabatan', 'karyawan.id_jabatan = karyawan_jabatan.id_jabatan');

    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_karyawan', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('sex', $q);
        $this->db->or_like('address', $q);
        $this->db->or_like('place', $q);
        $this->db->or_like('date', $q);
        $this->db->or_like('id_jabatan', $q);
        $this->db->or_like('salary', $q);
        $this->db->or_like('id_devisi', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order); 
        $this->db->like('id_karyawan', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('sex', $q);
        $this->db->or_like('address', $q);
        $this->db->or_like('place', $q);
        $this->db->or_like('date', $q);
        $this->db->or_like('id_jabatan', $q);
        $this->db->or_like('salary', $q);
        $this->db->or_like('id_devisi', $q);
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

/* End of file Karyawan_model.php */
/* Location: ./application/models/Karyawan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-14 03:31:23 */
/* http://harviacode.com */