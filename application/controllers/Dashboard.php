<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        is_login();
		// check_admin();
    }

	public function index()
	{

		$this->template->load('template','dashboard');
	}

	function get_total_pekerjaan()
	{
		$this->load->model('Dashboard_model');

		$pekerjaans = $this->Dashboard_model->get_all_pekerjaan();

		$datanya = [];

		foreach ($pekerjaans as $key => $value) {
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

}
