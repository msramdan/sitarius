<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        is_login();
		$this->load->model('Dashboard_model');
		// check_admin();
    }

	public function index()
	{
		$data['thisnyak'] = $this;

		// check session user
		$levelid = $this->session->userdata('level_id');

		if($levelid == 1) {
			$this->template->load('template_admin','admin/dashboard', $data);
		}

		if($levelid == 2) {
			$this->template->load('template_user','user/dashboard', $data);
		}

	}

	function get_total_pekerjaan()
	{
		$pekerjaans = $this->Dashboard_model->get_all_pekerjaan();

		$datanya = [];

		foreach ($pekerjaans as $value) {
			# code...
			$data = $this->Dashboard_model->countpendudukbypekerjaan($value->pekerjaan_id);
			$datanya[] = [
				'name' => $value->nama_pekerjaan,
				'y' => $data,
				'drilldown' => null
			];
		}

		echo json_encode($datanya);
	}

	function get_total_gender() {
		$genders = ['Perempuan', 'Laki-laki'];

		$datanya = [];

		foreach ($genders as $value) {
			$total = $this->Dashboard_model->countbygender($value);
			$datanya[] = [
				'name' => $value,
				'y' => $total
			];
		}

		echo json_encode($datanya);
	}

	function countgendermale(){
		$data = $this->db->query("SELECT COUNT(*) as total FROM anggota_kk WHERE jenis_kelamin = 'Laki-laki'")->row();
		echo $data->total;
	}

	function countgenderfemale(){
		$data = $this->db->query("SELECT COUNT(*) as total FROM anggota_kk WHERE jenis_kelamin = 'Perempuan'")->row();
		echo $data->total;
	}

	function countpenduduk(){
		$data = $this->db->query("SELECT COUNT(*) as total FROM anggota_kk")->row();
		echo $data->total;
	}
}
