<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemateri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pemateri_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $pemateri = $this->Pemateri_model->get_all();
        $data = array(
            'pemateri_data' => $pemateri,
        );
        $this->template->load('template', 'pemateri/pemateri_list', $data);
    }

    public function read($id)
    {
        $row = $this->Pemateri_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
                'pemateri_id' => $row->pemateri_id,
                'nama_pemateri' => $row->nama_pemateri,
                'no_hp' => $row->no_hp,
            );
            $this->template->load('template', 'pemateri/pemateri_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemateri'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pemateri/create_action'),
            'pemateri_id' => set_value('pemateri_id'),
            'nama_pemateri' => set_value('nama_pemateri'),
            'no_hp' => set_value('no_hp'),
        );
        $this->template->load('template', 'pemateri/pemateri_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_pemateri' => $this->input->post('nama_pemateri', TRUE),
                'no_hp' => $this->input->post('no_hp', TRUE),
            );

            $this->Pemateri_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pemateri'));
        }
    }

    public function update($id)
    {
        $row = $this->Pemateri_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pemateri/update_action'),
                'pemateri_id' => set_value('pemateri_id', $row->pemateri_id),
                'nama_pemateri' => set_value('nama_pemateri', $row->nama_pemateri),
                'no_hp' => set_value('no_hp', $row->no_hp),
            );
            $this->template->load('template', 'pemateri/pemateri_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemateri'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update(encrypt_url($this->input->post('pemateri_id', TRUE)));
        } else {
            $data = array(
                'nama_pemateri' => $this->input->post('nama_pemateri', TRUE),
                'no_hp' => $this->input->post('no_hp', TRUE),
            );

            $this->Pemateri_model->update($this->input->post('pemateri_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pemateri'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pemateri_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Pemateri_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pemateri'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemateri'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_pemateri', 'nama pemateri', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'no hp', 'trim|required|callback_validate_must_be_expected_number_phone');

        $this->form_validation->set_rules('pemateri_id', 'pemateri_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function validate_must_be_expected_number_phone($str)
    {
        if (!preg_match("/^(628)([0-9\s\-\+\(\)]*)$/", $str)) {
            $this->form_validation->set_message('validate_must_be_expected_number_phone', 'Nomor HP harus berawalan 628');
            return false;
        } else {
            return true;
        }
    }
}

/* End of file Pemateri.php */
/* Location: ./application/controllers/Pemateri.php */
/* Please DO NOT modify this information : */
