<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'karyawan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'karyawan/index/';
            $config['first_url'] = base_url() . 'karyawan/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Karyawan_model->total_rows($q);
        $karyawan = $this->Karyawan_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'karyawan_data' => $karyawan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'karyawan/karyawan_list', $data);
    }

    public function read($id)
    {
        $row = $this->Karyawan_model->get_by_id($id);
        // $data['jabatan'] = $this->db->get_where('karyawan_jabatan', array('id_karyawan' =>  $row->id_karyawan);
        if ($row) {
            $data = array(
                'id_karyawan' => $row->id_karyawan,
                'nama' => $row->nama,
                'sex' => $row->sex,
                'address' => $row->address,
                'place' => $row->place,
                'date' => $row->date,
                'id_jabatan' => $row->id_jabatan,
                'salary' => $row->salary,
                'id_devisi' => $row->id_devisi,
            );
            $this->template->load('template', 'karyawan/karyawan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('karyawan/create_action'),
            'id_karyawan' => set_value('id_karyawan'),
            'nama' => set_value('nama'),
            'sex' => set_value('sex'),
            'address' => set_value('address'),
            'place' => set_value('place'),
            'date' => set_value('date'),
            'id_jabatan' => set_value('id_jabatan'),
            'salary' => set_value('salary'),
            'id_devisi' => set_value('id_devisi'),
        );
        $this->template->load('template', 'karyawan/karyawan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'sex' => $this->input->post('sex', TRUE),
                'address' => $this->input->post('address', TRUE),
                'place' => $this->input->post('place', TRUE),
                'date' => $this->input->post('date', TRUE),
                'id_jabatan' => $this->input->post('id_jabatan', TRUE),
                'salary' => $this->input->post('salary', TRUE),
                'id_devisi' => $this->input->post('id_devisi', TRUE),
            );

            $this->Karyawan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('karyawan'));
        }
    }

    public function update($id)
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('karyawan/update_action'),
                'id_karyawan' => set_value('id_karyawan', $row->id_karyawan),
                'nama' => set_value('nama', $row->nama),
                'sex' => set_value('sex', $row->sex),
                'address' => set_value('address', $row->address),
                'place' => set_value('place', $row->place),
                'date' => set_value('date', $row->date),
                'id_jabatan' => set_value('id_jabatan', $row->id_jabatan),
                'salary' => set_value('salary', $row->salary),
                'id_devisi' => set_value('id_devisi', $row->id_devisi),
            );
            $this->template->load('template', 'karyawan/karyawan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_karyawan', TRUE));
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'sex' => $this->input->post('sex', TRUE),
                'address' => $this->input->post('address', TRUE),
                'place' => $this->input->post('place', TRUE),
                'date' => $this->input->post('date', TRUE),
                'id_jabatan' => $this->input->post('id_jabatan', TRUE),
                'salary' => $this->input->post('salary', TRUE),
                'id_devisi' => $this->input->post('id_devisi', TRUE),
            );

            $this->Karyawan_model->update($this->input->post('id_karyawan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('karyawan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $this->Karyawan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('sex', 'sex', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        $this->form_validation->set_rules('place', 'place', 'trim|required');
        $this->form_validation->set_rules('date', 'date', 'trim|required');
        $this->form_validation->set_rules('id_jabatan', 'id jabatan', 'trim|required');
        $this->form_validation->set_rules('salary', 'salary', 'trim|required');
        $this->form_validation->set_rules('id_devisi', 'id devisi', 'trim|required');

        $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-14 03:31:23 */
/* http://harviacode.com */