<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Kantor_wilayah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Kantor_wilayah_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$kantor_wilayah = $this->Kantor_wilayah_model->get_all();
		$data = array(
			'kantor_wilayah_data' => $kantor_wilayah,
		);
		$this->template->load('template', 'kantor_wilayah/kantor_wilayah_list', $data);
	}

	public function read($id)
	{
		$row = $this->Kantor_wilayah_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'kantor_wilayah_id' => $row->kantor_wilayah_id,
				'nama_kantor_wilayah' => $row->nama_kantor_wilayah,
			);
			$this->template->load('template', 'kantor_wilayah/kantor_wilayah_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kantor_wilayah'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('kantor_wilayah/create_action'),
			'kantor_wilayah_id' => set_value('kantor_wilayah_id'),
			'nama_kantor_wilayah' => set_value('nama_kantor_wilayah'),
		);
		$this->template->load('template', 'kantor_wilayah/kantor_wilayah_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama_kantor_wilayah' => $this->input->post('nama_kantor_wilayah', TRUE),
			);

			$this->Kantor_wilayah_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('kantor_wilayah'));
		}
	}

	public function update($id)
	{
		$row = $this->Kantor_wilayah_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('kantor_wilayah/update_action'),
				'kantor_wilayah_id' => set_value('kantor_wilayah_id', $row->kantor_wilayah_id),
				'nama_kantor_wilayah' => set_value('nama_kantor_wilayah', $row->nama_kantor_wilayah),
			);
			$this->template->load('template', 'kantor_wilayah/kantor_wilayah_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kantor_wilayah'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('kantor_wilayah_id', TRUE));
		} else {
			$data = array(
				'nama_kantor_wilayah' => $this->input->post('nama_kantor_wilayah', TRUE),
			);

			$this->Kantor_wilayah_model->update($this->input->post('kantor_wilayah_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('kantor_wilayah'));
		}
	}

	public function delete($id)
	{
		$row = $this->Kantor_wilayah_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Kantor_wilayah_model->delete(decrypt_url($id));
			$error = $this->db->error();
			if ($error['code'] != 0) {
				$this->session->set_flashdata('error', 'Data tidak bisa di delete, sudah berelasi');
			} else {
				$this->session->set_flashdata('message', 'Delete Record Success');
			}

			redirect(site_url('kantor_wilayah'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kantor_wilayah'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_kantor_wilayah', 'nama kantor wilayah', 'trim|required');

		$this->form_validation->set_rules('kantor_wilayah_id', 'kantor_wilayah_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Kantor_wilayah.php */
/* Location: ./application/controllers/Kantor_wilayah.php */
/* Please DO NOT modify this information : */
