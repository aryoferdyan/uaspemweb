<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cuti_hrd extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Cuti_hrd_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','cuti_hrd/cuti_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Cuti_hrd_model->json();
    }

    public function read($id) 
    {
        $row = $this->Cuti_hrd_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_karyawan' => $row->id_karyawan,
                'nama' => $row->nama,
                'tanggal1' => $row->tanggal1,
                'tanggal2' => $row->tanggal2,
                'jenis' => $row->jenis,
                'validasi' => $row->validasi,
	        );
            $this->template->load('template','cuti_hrd/cuti_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cuti_hrd'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('cuti_hrd/create_action'),
            'id_cuti' => set_value('id_cuti'),
            'id_karyawan' => set_value('id_karyawan'),
            // 'nama' => set_value('nama'),
            'tanggal1' => set_value('tanggal1'),
            'tanggal2' => set_value('tanggal2'),
            'id_jenis' => set_value('id_jenis'),
            'validasi' => set_value('validasi'),
	);
        $this->template->load('template','cuti_hrd/cuti_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_cuti' => $this->input->post('id_cuti', TRUE),
                'id_karyawan' => $this->input->post('id_karyawan', TRUE),
                'tanggal1' => $this->input->post('tanggal1', TRUE),
                'tanggal2' => $this->input->post('tanggal2', TRUE),
                'id_jenis' => $this->input->post('id_jenis', TRUE),
                'validasi' => $this->input->post('validasi', TRUE)
            );

            $this->Cuti_hrd_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('cuti_hrd'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Cuti_hrd_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('cuti_hrd/update_action'),
                'id_cuti' => set_value('id_cuti', $row->id_cuti),
                'id_karyawan' => set_value('id_karyawan', $row->id_karyawan),
                'nama' => set_value('nama', $row->nama),
                'tanggal1' => set_value('tanggal1', $row->tanggal1),
                'tanggal2' => set_value('tanggal2', $row->tanggal2),
                'id_jenis' => set_value('id_jenis', $row->id_jenis),
                'validasi' => set_value('validasi', $row->validasi)
            );
            $this->template->load('template','cuti_hrd/cuti_update', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cuti_hrd'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_cuti', TRUE));
        } else {
            $data = array(
                'id_karyawan' => $this->input->post('id_karyawan', TRUE),
                'tanggal1' => $this->input->post('tanggal1', TRUE),
                'tanggal2' => $this->input->post('tanggal2', TRUE),
                'id_jenis' => $this->input->post('id_jenis', TRUE),
                'validasi' => $this->input->post('validasi', TRUE),
            );

            $this->Cuti_hrd_model->update($this->input->post('id_cuti', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('cuti_hrd'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Cuti_hrd_model->get_by_id($id);

        if ($row) {
            $this->Cuti_hrd_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('cuti_hrd'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cuti_hrd'));
        }
    }

    public function accept($id) 
    {
        $row = $this->Cuti_hrd_model->get_by_id($id);

        if ($row) {
            $data = array(
                'validasi' => 1
            );
            $this->Cuti_hrd_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('cuti_hrd'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cuti_hrd'));
        }
    }

    public function reject($id) 
    {
        $row = $this->Cuti_hrd_model->get_by_id($id);

        if ($row) {
            $data = array(
                'validasi' => 0
            );
            $this->Cuti_hrd_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('cuti_hrd'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cuti_hrd'));
        }
    }

    

    public function _rules() 
    {
	$this->form_validation->set_rules('id_karyawan', 'id karyawan', 'trim|required');
	$this->form_validation->set_rules('tanggal1', 'tanggal1', 'trim|required');
	$this->form_validation->set_rules('tanggal2', 'tanggal2', 'trim|required');
	$this->form_validation->set_rules('id_jenis', 'id jenis', 'trim|required');
	$this->form_validation->set_rules('validasi', 'validasi', 'trim|required');
	$this->form_validation->set_rules('id_cuti', 'id_cuti', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Cuti_hrd.php */
/* Location: ./application/controllers/Cuti_hrd.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-18 15:16:46 */
/* http://harviacode.com */