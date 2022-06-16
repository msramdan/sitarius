<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendidikan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Pendidikan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $pendidikan = $this->Pendidikan_model->get_all();
        $data = array(
            'pendidikan_data' => $pendidikan,
        );
        $this->template->load('template','admin/pendidikan/pendidikan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pendidikan_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'pendidikan_id' => $row->pendidikan_id,
		'nama_pendidikan' => $row->nama_pendidikan,
	    );
            $this->template->load('template','admin/pendidikan/pendidikan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendidikan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pendidikan/create_action'),
	    'pendidikan_id' => set_value('pendidikan_id'),
	    'nama_pendidikan' => set_value('nama_pendidikan'),
	);
        $this->template->load('template','admin/pendidikan/pendidikan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_pendidikan' => $this->input->post('nama_pendidikan',TRUE),
	    );

            $this->Pendidikan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pendidikan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pendidikan_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pendidikan/update_action'),
		'pendidikan_id' => set_value('pendidikan_id', $row->pendidikan_id),
		'nama_pendidikan' => set_value('nama_pendidikan', $row->nama_pendidikan),
	    );
            $this->template->load('template','admin/pendidikan/pendidikan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendidikan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pendidikan_id', TRUE));
        } else {
            $data = array(
		'nama_pendidikan' => $this->input->post('nama_pendidikan',TRUE),
	    );

            $this->Pendidikan_model->update($this->input->post('pendidikan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pendidikan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pendidikan_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Pendidikan_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pendidikan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendidikan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_pendidikan', 'nama pendidikan', 'trim|required');

	$this->form_validation->set_rules('pendidikan_id', 'pendidikan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pendidikan.php */
/* Location: ./application/controllers/Pendidikan.php */
/* Please DO NOT modify this information : */