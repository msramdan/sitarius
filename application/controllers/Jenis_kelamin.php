<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_kelamin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Jenis_kelamin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $jenis_kelamin = $this->Jenis_kelamin_model->get_all();
        $data = array(
            'jenis_kelamin_data' => $jenis_kelamin,
        );
        $this->template->load('template','jenis_kelamin/jenis_kelamin_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenis_kelamin_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'jenis_kelamin_id' => $row->jenis_kelamin_id,
		'nama_jenis_kelamin' => $row->nama_jenis_kelamin,
	    );
            $this->template->load('template','jenis_kelamin/jenis_kelamin_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_kelamin'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_kelamin/create_action'),
	    'jenis_kelamin_id' => set_value('jenis_kelamin_id'),
	    'nama_jenis_kelamin' => set_value('nama_jenis_kelamin'),
	);
        $this->template->load('template','jenis_kelamin/jenis_kelamin_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_jenis_kelamin' => $this->input->post('nama_jenis_kelamin',TRUE),
	    );

            $this->Jenis_kelamin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_kelamin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_kelamin_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_kelamin/update_action'),
		'jenis_kelamin_id' => set_value('jenis_kelamin_id', $row->jenis_kelamin_id),
		'nama_jenis_kelamin' => set_value('nama_jenis_kelamin', $row->nama_jenis_kelamin),
	    );
            $this->template->load('template','jenis_kelamin/jenis_kelamin_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_kelamin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jenis_kelamin_id', TRUE));
        } else {
            $data = array(
		'nama_jenis_kelamin' => $this->input->post('nama_jenis_kelamin',TRUE),
	    );

            $this->Jenis_kelamin_model->update($this->input->post('jenis_kelamin_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_kelamin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_kelamin_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Jenis_kelamin_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_kelamin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_kelamin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_jenis_kelamin', 'nama jenis kelamin', 'trim|required');

	$this->form_validation->set_rules('jenis_kelamin_id', 'jenis_kelamin_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jenis_kelamin.xls";
        $judul = "jenis_kelamin";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Jenis Kelamin");

	foreach ($this->Jenis_kelamin_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_jenis_kelamin);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jenis_kelamin.doc");

        $data = array(
            'jenis_kelamin_data' => $this->Jenis_kelamin_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('jenis_kelamin/jenis_kelamin_doc',$data);
    }

}

/* End of file Jenis_kelamin.php */
/* Location: ./application/controllers/Jenis_kelamin.php */
/* Please DO NOT modify this information : */