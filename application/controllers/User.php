<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$user = $this->User_model->get_all();
		$data = array(
			'user_data' => $user,
		);
		$this->template->load('template_admin', 'admin/user/user_list', $data);
	}

	public function read($id)
	{
		$row = $this->User_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'user_id' => $row->user_id,
				'username' => $row->username,
				'password' => $row->password,
				'level_id' => $row->level_id,
			);
			$this->template->load('template_admin', 'admin/user/user_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('user'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('user/create_action'),
			'user_id' => set_value('user_id'),
			'username' => set_value('username'),
			'password' => set_value('password'),
			'level_id' => set_value('level_id'),
		);
		$this->template->load('template_admin', 'admin/user/user_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'username' => $this->input->post('username', TRUE),
				'password' => $this->input->post('password', TRUE),
				'level_id' => $this->input->post('level_id', TRUE),
			);

			$this->User_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('user'));
		}
	}

	public function update($id)
	{
		$row = $this->User_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('user/update_action'),
				'user_id' => set_value('user_id', $row->user_id),
				'username' => set_value('username', $row->username),
				'password' => set_value('password', $row->password),
				'level_id' => set_value('level_id', $row->level_id),
			);
			$this->template->load('template_admin', 'admin/user/user_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('user'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('user_id', TRUE));
		} else {
			$data = array(
				'username' => $this->input->post('username', TRUE),
				'password' => $this->input->post('password', TRUE),
				'level_id' => $this->input->post('level_id', TRUE),
			);

			$this->User_model->update($this->input->post('user_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('user'));
		}
	}

	public function delete($id)
	{
		$row = $this->User_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->User_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('user'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('user'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('level_id', 'level id', 'trim|required');

		$this->form_validation->set_rules('user_id', 'user_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function ganti_password($id)
	{
		$data = array(
			'password' => sha1($this->input->post('password')),
		);
		$this->User_model->update($id, $data);

		// unset session login
		$params = array('userid', 'level_id');
		$this->session->unset_userdata($params);
		echo "<script>
        alert('Update password berhasil, Silahkan login kembali !');
        window.location='".site_url('auth')."'</script>";

	}

	function get_detail_akun()
	{
		check_admin();
		$id_kk = decrypt_url($this->input->post('kk_id'));

		$personal_id = $this->input->post('personal_id');

		$this->load->model('Anggotakk_model');

		$getanggotakk = $this->Anggotakk_model->get_by_personalidandidkk($personal_id, $id_kk);

		$id_anggota_kk = $getanggotakk->anggota_kk_id;

		// get data user by id_anggota_kk
		$getdatauser = $this->User_model->getakunanggotakk($id_anggota_kk);
		$data = array(
			'user_id' => encrypt_url($getdatauser->user_id),
			'username' => $getdatauser->username,
			'password' => $getdatauser->password,
		);

		echo json_encode($data);
	}

	function reset_password() {
		$id = decrypt_url($this->input->post('id'));
		$this->load->helper('string');

		$password = random_string('alnum', 6);
		$data = array(
			'password' => $password,
		);
		$this->User_model->update($id, $data);
		
		echo json_encode($data);
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
