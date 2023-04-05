<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Budget_kategori extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Budget_kategori_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$budget_kategori = $this->Budget_kategori_model->get_all();
		$data = array(
			'budget_kategori_data' => $budget_kategori,
		);
		$this->template->load('template', 'budget_kategori/budget_kategori_list', $data);
	}

	public function read($id)
	{
		$row = $this->Budget_kategori_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'budget_kategori_id' => $row->budget_kategori_id,
				'nama_kategori' => $row->nama_kategori,
			);
			$this->template->load('template', 'budget_kategori/budget_kategori_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('budget_kategori'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('budget_kategori/create_action'),
			'budget_kategori_id' => set_value('budget_kategori_id'),
			'nama_kategori' => set_value('nama_kategori'),
		);
		$this->template->load('template', 'budget_kategori/budget_kategori_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama_kategori' => $this->input->post('nama_kategori', TRUE),
			);

			$this->Budget_kategori_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('budget_kategori'));
		}
	}

	public function update($id)
	{
		$row = $this->Budget_kategori_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('budget_kategori/update_action'),
				'budget_kategori_id' => set_value('budget_kategori_id', $row->budget_kategori_id),
				'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
			);
			$this->template->load('template', 'budget_kategori/budget_kategori_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('budget_kategori'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('budget_kategori_id', TRUE));
		} else {
			$data = array(
				'nama_kategori' => $this->input->post('nama_kategori', TRUE),
			);

			$this->Budget_kategori_model->update($this->input->post('budget_kategori_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('budget_kategori'));
		}
	}

	public function delete($id)
	{
		$row = $this->Budget_kategori_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Budget_kategori_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('budget_kategori'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('budget_kategori'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');

		$this->form_validation->set_rules('budget_kategori_id', 'budget_kategori_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Budget_kategori.php */
/* Location: ./application/controllers/Budget_kategori.php */
/* Please DO NOT modify this information : */
