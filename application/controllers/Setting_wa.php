<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting_wa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Setting_wa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $row = $this->Setting_wa_model->findFirst();

        if (!$row) {
            echo 'Setting Wa Notification Not Found';
            exit;
        } else {
            $data = array(
                'button' => 'Update',
                'action' => site_url('setting_wa/update_action'),
                'url' => $row->url,
                'session_id' => $row->session_id,
                'is_notif_wa' => $row->is_notif_wa,
            );

            $this->template->load('template', 'setting_wa/edit', $data);
        }
    }

    /**
     * Update Action
     * 
     */
    public function update_action()
    {
        $row = $this->Setting_wa_model->findFirst();

        if (!$row) {
            echo 'Setting Wa Notification Not Found';
            exit;
        } else {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                return $this->index();
            } else {
                $data = [
                    'session_id' => $this->input->post('session_id', TRUE),
                    'is_notif_wa' => $this->input->post('is_notif_wa', TRUE),
                    'url' => $this->input->post('url', TRUE),
                ];

                $this->Setting_wa_model->update($row->setting_wa_id, $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('setting_wa'));
            }
        }
    }

    /**
     * Rules
     * 
     */
    public function _rules()
    {
        $this->form_validation->set_rules('url', 'url', 'trim|required|callback_check_valid_url');
        $this->form_validation->set_rules('session_id', 'Session ID', 'trim|required');
        $this->form_validation->set_rules('is_notif_wa', 'Status', 'required|in_list[1,0]');
    }

    /**
     * Custom validation
     * 
     */
    public function check_valid_url($param)
    {
        if (!filter_var($param, FILTER_VALIDATE_URL)) {
            $this->form_validation->set_message('check_valid_url', 'The {field} must be a valid url');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
