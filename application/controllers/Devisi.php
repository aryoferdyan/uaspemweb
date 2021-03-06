<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Devisi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Devisi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','devisi/karyawan_devisi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Devisi_model->json();
    }


    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('devisi/create_action'),
	    'id_devisi' => set_value('id_devisi'),
	    'devisi' => set_value('devisi'),
	);
        $this->template->load('template','devisi/karyawan_devisi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'devisi' => $this->input->post('devisi',TRUE),
	    );

            $this->Devisi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('devisi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Devisi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('devisi/update_action'),
		'id_devisi' => set_value('id_devisi', $row->id_devisi),
		'devisi' => set_value('devisi', $row->devisi),
	    );
            $this->template->load('template','devisi/karyawan_devisi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('devisi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_devisi', TRUE));
        } else {
            $data = array(
		'devisi' => $this->input->post('devisi',TRUE),
	    );

            $this->Devisi_model->update($this->input->post('id_devisi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('devisi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Devisi_model->get_by_id($id);

        if ($row) {
            $this->Devisi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('devisi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('devisi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('devisi', 'devisi', 'trim|required');

	$this->form_validation->set_rules('id_devisi', 'id_devisi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Devisi.php */
/* Location: ./application/controllers/Devisi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-21 03:49:04 */
/* http://harviacode.com */