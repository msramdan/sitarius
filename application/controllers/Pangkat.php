<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Pangkat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Pangkat_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$pangkat = $this->Pangkat_model->get_all();
		$data = array(
			'pangkat_data' => $pangkat,
		);
		$this->template->load('template', 'pangkat/pangkat_list', $data);
	}

	public function read($id)
	{
		$row = $this->Pangkat_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'pangkat_id' => $row->pangkat_id,
				'nama_pangkat' => $row->nama_pangkat,
				'golongan' => $row->golongan,
				'ruangan' => $row->ruangan,
			);
			$this->template->load('template', 'pangkat/pangkat_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pangkat'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('pangkat/create_action'),
			'pangkat_id' => set_value('pangkat_id'),
			'nama_pangkat' => set_value('nama_pangkat'),
			'golongan' => set_value('golongan'),
			'ruangan' => set_value('ruangan'),
		);
		$this->template->load('template', 'pangkat/pangkat_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama_pangkat' => $this->input->post('nama_pangkat', TRUE),
				'golongan' => $this->input->post('golongan', TRUE),
				'ruangan' => $this->input->post('ruangan', TRUE),
			);

			$this->Pangkat_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('pangkat'));
		}
	}

	public function update($id)
	{
		$row = $this->Pangkat_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('pangkat/update_action'),
				'pangkat_id' => set_value('pangkat_id', $row->pangkat_id),
				'nama_pangkat' => set_value('nama_pangkat', $row->nama_pangkat),
				'golongan' => set_value('golongan', $row->golongan),
				'ruangan' => set_value('ruangan', $row->ruangan),
			);
			$this->template->load('template', 'pangkat/pangkat_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pangkat'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('pangkat_id', TRUE));
		} else {
			$data = array(
				'nama_pangkat' => $this->input->post('nama_pangkat', TRUE),
				'golongan' => $this->input->post('golongan', TRUE),
				'ruangan' => $this->input->post('ruangan', TRUE),
			);

			$this->Pangkat_model->update($this->input->post('pangkat_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('pangkat'));
		}
	}

	public function delete($id)
	{
		$row = $this->Pangkat_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Pangkat_model->delete(decrypt_url($id));
			$error = $this->db->error();
			if ($error['code'] != 0) {
				$this->session->set_flashdata('error', 'Data tidak bisa di delete, sudah berelasi');
			} else {
				$this->session->set_flashdata('message', 'Delete Record Success');
			}

			redirect(site_url('pangkat'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pangkat'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_pangkat', 'nama pangkat', 'trim|required');
		$this->form_validation->set_rules('golongan', 'golongan', 'trim|required');
		$this->form_validation->set_rules('ruangan', 'ruangan', 'trim|required');

		$this->form_validation->set_rules('pangkat_id', 'pangkat_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Pangkat.php */
/* Location: ./application/controllers/Pangkat.php */
/* Please DO NOT modify this information : */
