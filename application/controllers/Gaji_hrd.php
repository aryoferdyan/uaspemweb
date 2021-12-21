<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gaji_hrd extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Gaji_hrd_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'gaji_hrd/gaji_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Gaji_hrd_model->json();
    }

    public function print($id)
    {
        $row = $this->Gaji_hrd_model->get_by_id($id);
        if ($row) {
            $data = array(
                'no_slip' => $row->no_slip,
                'id_karyawan' => $row->id_karyawan,
                'nama' => $row->nama,
                'jabatan' => $row->jabatan,
                'salary' => $row->salary,
                'tunjangan' => $row->tunjangan,
                'potongan' => $row->potongan,
                'tgl_penggajian' => $row->tgl_penggajian

            );
            $this->load->view('gaji_hrd/gaji_print', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gaji_hrd'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('gaji_hrd/create_action'),
            'no_slip' => set_value('no_slip'),
            'id_karyawan' => set_value('id_karyawan'),
            // 'nama' => set_value('nama'),
            'bln_periode' => set_value('bln_periode'),
            'thn_periode' => set_value('thn_periode'),
            'tgl_penggajian' => set_value('id_penggajian'),
            
        );
        $this->template->load('template', 'gaji_hrd/gaji_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'no_slip' => $this->input->post('no_slip', TRUE),
                'id_karyawan' => $this->input->post('id_karyawan', TRUE),
                'bln_periode' => $this->input->post('bln_periode', TRUE),
                'thn_periode' => $this->input->post('thn_periode', TRUE),
                'tgl_penggajian' => $this->input->post('tgl_penggajian', TRUE)
            );
            $this->Gaji_hrd_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('gaji_hrd'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('no_slip', 'no slip', 'trim|required');
        $this->form_validation->set_rules('id_karyawan', 'id karyawan', 'trim|required');
        $this->form_validation->set_rules('bln_periode', 'bln periode', 'trim|required');
        $this->form_validation->set_rules('thn_periode', 'thn periode', 'trim|required');
        $this->form_validation->set_rules('tgl_penggajian', 'tgl penggajian', 'trim|required');
    }

}