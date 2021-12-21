<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gaji_model extends CI_Model
{

    public $table = 'gaji';
    public $id = 'no_slip';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('gaji.no_slip, gaji.id_karyawan, karyawan.nama, karyawan_jabatan.jabatan, gaji.tgl_penggajian, karyawan.salary, karyawan_jabatan.tunjangan, karyawan.salary - round(karyawan.salary * count(presensi.tanggal) / 30) as potongan, round(karyawan.salary * count(presensi.tanggal) / 30) + tunjangan as total_gaji');
        $this->datatables->from('gaji');
        $this->datatables->join('karyawan','gaji.id_karyawan = karyawan.id_karyawan');
        $this->datatables->join('karyawan_jabatan','karyawan_jabatan.id_jabatan = karyawan.id_jabatan');
        $this->datatables->join('presensi','presensi.id_karyawan = gaji.id_karyawan');
        $this->datatables->where("gaji.id_karyawan", $_SESSION['id_users']);
        $this->datatables->group_by('gaji.id_karyawan');
        $this->datatables->add_column('action', anchor(site_url('gaji/print/$1'), '<i class="fa fa-print" aria-hidden="true"></i>', array('class' => 'btn btn-primary btn-sm', 'id' => 'cetakButton')) . " 
                ", 'no_slip');
        return $this->datatables->generate();
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

    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->query("SELECT gaji.no_slip, gaji.id_karyawan, karyawan.nama, karyawan_jabatan.jabatan, gaji.tgl_penggajian, karyawan.salary, karyawan_jabatan.tunjangan, karyawan.salary - round(karyawan.salary * count(presensi.tanggal) / 30) as potongan, round(karyawan.salary * count(presensi.tanggal) / 30) + tunjangan as total_gaji
        FROM gaji
        INNER JOIN karyawan ON gaji.id_karyawan = karyawan.id_karyawan
        INNER JOIN karyawan_jabatan ON karyawan_jabatan.id_jabatan = karyawan.id_jabatan
        INNER JOIN presensi ON presensi.id_karyawan = gaji.id_karyawan
        WHERE gaji.no_slip = '$id'
        GROUP BY gaji.id_karyawan")->row();
        
    }

}
