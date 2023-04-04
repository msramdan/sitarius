<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Budget extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Budget_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$budget = $this->Budget_model->get_all();
		$data = array(
			'budget_data' => $budget,
		);
		$this->template->load('template', 'budget/budget_list', $data);
	}

	public function read($id)
	{
		$row = $this->Budget_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'budget_id' => $row->budget_id,
				'nama_budget' => $row->nama_budget,
				'nominal_budget' => $row->nominal_budget,
			);
			$this->template->load('template', 'budget/budget_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('budget'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('budget/create_action'),
			'budget_id' => set_value('budget_id'),
			'nama_budget' => set_value('nama_budget'),
			'nominal_budget' => set_value('nominal_budget'),
		);
		$this->template->load('template', 'budget/budget_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama_budget' => $this->input->post('nama_budget', TRUE),
				'nominal_budget' => $this->input->post('nominal_budget', TRUE),
			);

			$this->Budget_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('budget'));
		}
	}

	public function update($id)
	{
		$row = $this->Budget_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('budget/update_action'),
				'budget_id' => set_value('budget_id', $row->budget_id),
				'nama_budget' => set_value('nama_budget', $row->nama_budget),
				'nominal_budget' => set_value('nominal_budget', $row->nominal_budget),
			);
			$this->template->load('template', 'budget/budget_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('budget'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('budget_id', TRUE));
		} else {
			$data = array(
				'nama_budget' => $this->input->post('nama_budget', TRUE),
				'nominal_budget' => $this->input->post('nominal_budget', TRUE),
			);

			$this->Budget_model->update($this->input->post('budget_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('budget'));
		}
	}

	public function delete($id)
	{
		$row = $this->Budget_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Budget_model->delete(decrypt_url($id));

			$error = $this->db->error();
			if ($error['code'] != 0) {
				$this->session->set_flashdata('error', 'Data tidak dapat dihapus (Sudah Berelasi)');
			} else {
				$this->session->set_flashdata('message', 'Delete Record Success');
			}
			redirect(site_url('budget'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('budget'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_budget', 'nama budget', 'trim|required');
		$this->form_validation->set_rules('nominal_budget', 'nominal budget', 'trim|required');

		$this->form_validation->set_rules('budget_id', 'budget_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Budget.php */
/* Location: ./application/controllers/Budget.php */
/* Please DO NOT modify this information : */
