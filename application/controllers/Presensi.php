<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Presensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Presensi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/presensi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/presensi/index/';
            $config['first_url'] = base_url() . 'index.php/presensi/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Presensi_model->total_rows($q);
        $presensi = $this->Presensi_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'presensi_data' => $presensi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','presensi/presensi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Presensi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_presensi' => $row->id_presensi,
		'id_karyawan' => $row->id_karyawan,
		'tanggal' => $row->tanggal,
		'waktu_masuk' => $row->waktu_masuk,
		'waktu_keluar' => $row->waktu_keluar,
	    );
            $this->template->load('template','presensi/presensi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('presensi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('presensi/create_action'),
	    'id_presensi' => set_value('id_presensi'),
	    'id_karyawan' => set_value('id_karyawan'),
	    'tanggal' => set_value('tanggal'),
	    'waktu_masuk' => set_value('waktu_masuk'),
	    'waktu_keluar' => set_value('waktu_keluar'),
	);
        $this->template->load('template','presensi/presensi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_karyawan' => $this->input->post('id_karyawan',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'waktu_masuk' => $this->input->post('waktu_masuk',TRUE),
		'waktu_keluar' => $this->input->post('waktu_keluar',TRUE),
	    );

            $this->Presensi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('presensi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Presensi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('presensi/update_action'),
		'id_presensi' => set_value('id_presensi', $row->id_presensi),
		'id_karyawan' => set_value('id_karyawan', $row->id_karyawan),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'waktu_masuk' => set_value('waktu_masuk', $row->waktu_masuk),
		'waktu_keluar' => set_value('waktu_keluar', $row->waktu_keluar),
	    );
            $this->template->load('template','presensi/presensi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('presensi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_presensi', TRUE));
        } else {
            $data = array(
		'id_karyawan' => $this->input->post('id_karyawan',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'waktu_masuk' => $this->input->post('waktu_masuk',TRUE),
		'waktu_keluar' => $this->input->post('waktu_keluar',TRUE),
	    );

            $this->Presensi_model->update($this->input->post('id_presensi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('presensi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Presensi_model->get_by_id($id);

        if ($row) {
            $this->Presensi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('presensi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('presensi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_karyawan', 'id karyawan', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('waktu_masuk', 'waktu masuk', 'trim|required');
	$this->form_validation->set_rules('waktu_keluar', 'waktu keluar', 'trim|required');

	$this->form_validation->set_rules('id_presensi', 'id_presensi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Presensi.php */
/* Location: ./application/controllers/Presensi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-16 06:28:20 */
/* http://harviacode.com */